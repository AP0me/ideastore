@include('head')
<body>
  <div class="squish-sides">
    @include('navbar', ['routes' => $routes])
    <div class="idea-box">
      <div class="img-box">
        <div class="idea-img">
          <img src="./img/idea/{{$ideaDetails['img_name']}}">
        </div>
        <div class="img-slide">
          <button></button>
          <button></button>
          <button></button>
        </div>
      </div>
      <div class="text-box">
        {{$ideaDetails['name']}}
        <br>
        <hr style="height: 1px; border: 0; background-color: white">
        {{$ideaDetails['desc']}}
      </div>
      <div class="idea-cmd">
        <div class="bid-time-info">
          <div>{{$ideaDetails['price']/100}} $</div>
          <div>15 hours</div>
          <div class="bid-input">
            <input placeholder="Bid" type="number" oninput="this.value=parseInt(this.value)" min={{($ideaDetails['price']+100)/100}} value={{($ideaDetails['price']+100)/100}}>
            <div>$</div>
          </div>
          <button class="bid-btn">Submit</button>
        </div>
      </div>
      <div class="comments">
        @for($i = 0; $i < 10; $i++)
          <div class="comment">{{$i}}</div>
        @endfor
      </div>
    </div>
  </div>
</body>
</html>