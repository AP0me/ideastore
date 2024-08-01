@include('head')
<body>
  <div class="squish-sides">
    @include('navbar', ['routes' => $routes])
    <div class="recommended">
      <div class="x-overflow">
        <div class="xflow-1"></div>
        <div class="xflow-2"></div>
      </div>
      @foreach($recommendedList as $recommended)
        <a class="recommend-box" href="./idea?idea_id={{$recommended['idea_id']}}">
          <img class="box-img" src="./img/idea/{{$recommended['img_name']}}" alt="Image of the idea">
          <div class="box-name">
            <abbr title="{{ $recommended['description'] }}">{{ $recommended['name'] }}</abbr>
          </div>
          <div class="box-stats">
            <div>{{$recommended['price']/100}} $</div>
            <div></div>
            <div class="save-share">
              <abbr title="save">📌</abbr>
              <abbr title="share">📢</abbr>
            </div>
            <div>{{$recommended['deadline']}}</div>
          </div>
        </a>
      @endforeach
    </div>
  </div>
</body>
</html>