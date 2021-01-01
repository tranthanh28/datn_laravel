@extends('layouts.app')
@section('content')
<div id="example-2">
    <button v-on:click="say('hi')">Say Hi</button>
    <button v-on:click="say('what')">Say What</button>
  </div>
<script>
    new Vue({
  el: '#example-2',
  methods: {
    say: function (msg) {
      alert(msg)
    }
  }
})
</script>
@endsection
