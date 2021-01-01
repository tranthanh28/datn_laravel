@extends('layouts.app')
@section('content')
<div class="container" v-cloak id="app">
    <div>
      <button class="btn btn-primary" v-if="!room" v-on:click="createRoom">
      Tạo Meeting
      </button>
      <button class="btn btn-primary" v-if="!room" v-on:click="joinWithId">
      Join Meeting
      </button>
      <button class="btn btn-primary" v-if="room" v-on:click="publish(true)">
      Share Desktop
      </button>
    </div>
    <div v-if="roomId" class="info">
      Link phòng:
      <a v-bind:href="roomUrl" target="_blank">@{{roomUrl}}</a>
    <p>Id phòng: <code>@{{roomId}}</code> để share.</p>
  </div>
</div>
<div class="container">
  <div id="videos"></div>
</div>
<script src="{{ asset('js/script.js') }}"></script>
@endsection
