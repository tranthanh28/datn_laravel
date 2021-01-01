
const PROJECT_ID = "SKkAOz4c67186Nzc984Pa3ff6J2N6y66N";
const PROJECT_SECRET = "NWVydHBYbm1PNmJ4Q2Zlc0xzMUQ0MnJhTjZvVzlqY2s=";
const BASE_URL = "https://api.stringee.com/v1/room2";

class API {
  constructor(projectId, projectSecret) {
    this.projectId = projectId;
    this.projectSecret = projectSecret;
    this.restToken = "";
  }

  async createRoom() {
    const roomName = Math.random().toFixed(4);
    const response = await axios.post(
      `${BASE_URL}/create`,
      {
        name: roomName,
        uniqueName: roomName
      },
      {
        headers: this._authHeader()
      }
    );

    const room = response.data;
    console.log({ room });
    return room;
  }

  async listRoom() {
    const response = await axios.get(`${BASE_URL}/list`, {
      headers: this._authHeader()
    });

    const rooms = response.data.list;
    console.log({ rooms });
    return rooms;
  }

  async deleteRoom(roomId) {
    const response = await axios.put(`${BASE_URL}/delete`, {
      roomId
    }, {
      headers: this._authHeader()
    })

    console.log({response})

    return response.data;
  }

  async clearAllRooms() {
    const rooms = await this.listRoom()
    const response = await Promise.all(rooms.map(room => this.deleteRoom(room.roomId)))

    return response;
  }

  async setRestToken() {
    const tokens = await this._getToken({ rest: true });
    const restToken = tokens.rest_access_token;
    this.restToken = restToken;

    return restToken;
  }

  async getUserToken(userId) {
    const tokens = await this._getToken({ userId });
    return tokens.access_token;
  }

  async getRoomToken(roomId) {
    const tokens = await this._getToken({ roomId });
    return tokens.room_token;
  }

  async _getToken({ userId, roomId, rest }) {
    const response = await axios.get(
      "https://v2.stringee.com/web-sdk-conference-samples/php/token_helper.php",
      {
        params: {
          keySid: this.projectId,
          keySecret: this.projectSecret,
          userId,
          roomId,
          rest
        }
      }
    );

    const tokens = response.data;
    console.log({ tokens });
    return tokens;
  }

  isSafari() {
    const ua = navigator.userAgent.toLowerCase();
    return !ua.includes('chrome') && ua.includes('safari');
  }

  _authHeader() {
    return {
      "X-STRINGEE-AUTH": this.restToken
    };
  }
}

const api = new API(PROJECT_ID, PROJECT_SECRET);

const videoContainer = document.querySelector("#videos");
var node = document.createElement("div");                 // Create a <li> node
var textnode = document.createTextNode("Water");         // Create a text node
node.appendChild(textnode);                              // Append the text to <li>
videoContainer.appendChild(node);
const vm = new Vue({
  el: "#app",
  data: {
    userToken: "",
    roomId: "",
    roomToken: "",
    room: undefined,
    callClient: undefined
  },
  computed: {
    roomUrl: function() {
      return `http://${location.hostname}/datn/phonghoc.php?room=${this.roomId}`;
    }
  },
  // khi chương trình chạy
  async mounted() {
    // cài đặt RestToken
    api.setRestToken();

    //tham gia phòng bằng địa chỉ URL
    const urlParams = new URLSearchParams(location.search);
    const roomId = urlParams.get("room");
    if (roomId) {
      this.roomId = roomId;

      await this.join();
    }
  },
  methods: {
    authen: function() {
      return new Promise(async resolve => {
        const userId = `${(Math.random() * 100000).toFixed(6)}`;
        const userToken = await api.getUserToken(userId);
        this.userToken = userToken;

        if (!this.callClient) {
          //tạo client kết nối với hệ thống Stringee
          const client = new StringeeClient();
          // kiểm tra client đã kết nối hệ thống
          client.on("authen", function(res) {
            console.log("on authen: ", res);
            resolve(res);
          });
          this.callClient = client;
        }
        //client sử dụng userToken
        this.callClient.connect(userToken);
      });
    },
    publish: async function(screenSharing = false) {
      //tạo video ở máy local
      const localTrack = await StringeeVideo.createLocalVideoTrack(
        this.callClient,
        {
          audio: true,
          video: true,
          screen: screenSharing,
          videoDimensions: { width: 640, height: 360 }
        }
      );

      const videoElement = localTrack.attach();
      this.addVideo(videoElement);
      //các video khác join vào
      const roomData = await StringeeVideo.joinRoom(
        this.callClient,
        this.roomToken
      );
      const room = roomData.room;
      console.log({ roomData, room });

      if (!this.room) {
        this.room = room;
        room.clearAllOnMethos();
        //sự  kiện có video được thêm vào
        room.on("addtrack", e => {
          const track = e.info.track;
          console.log("addtrack", track);
          //nếu là video ở máy local thì return
          if (track.serverId === localTrack.serverId) {
            console.log("local");
            return;
          }
          //là video mới thì thêm video
          this.subscribe(track);
        });
        //khi có sự kiện thoát video
        room.on("removetrack", e => {
          const track = e.track;
          if (!track) {
            return;
          }
          //xóa video đấy đi
          const mediaElements = track.detach();
          mediaElements.forEach(element => element.remove());
        });

        // Join existing tracks
        //hien thi cac video trong list tracks
        roomData.listTracksInfo.forEach(info => this.subscribe(info));
      }
      //public các video khác lên local
      await room.publish(localTrack);
      console.log("room publish successful");
    },
    createRoom: async function() {
      const room = await api.createRoom();
      const roomId = room;
      const roomToken = await api.getRoomToken(roomId);

      this.roomId = roomId;
      this.roomToken = roomToken;
      console.log({ roomId, roomToken });

      await this.authen();
      await this.publish();
    },
    join: async function() {
      const roomToken = await api.getRoomToken(this.roomId);
      this.roomToken = roomToken;

      await this.authen();
      await this.publish();
    },
    joinWithId: async function() {
      const roomId = prompt("Nhập Room Id!");
      if (roomId) {
        this.roomId = roomId;
        await this.join();
      }
    },
    subscribe: async function(trackInfo) {
      const track = await this.room.subscribe(trackInfo.serverId);
      track.on("ready", () => {
        const videoElement = track.attach();
        this.addVideo(videoElement);
      });
    },
    addVideo: function(video) {
      video.setAttribute("controls", "true");
      video.setAttribute("playsinline", "true");
      console.log("video",video);
      videoContainer.appendChild(video);
    }
  }
});
