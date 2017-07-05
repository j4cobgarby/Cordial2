@component('obscurer')
@endcomponent
<div id="posts infinite-scroll" class="posts grid">
  
  {{--
  <div class="grid-item discover" onclick='window.location.href="/discover"'>
    <b>Click here</b> to discover new people and interesting posts!
  </div>
  --}}
  {{$posts}}

</div>
<button class="loadposts">Load some more</button>
