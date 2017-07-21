<section class="slider">
    <div class="container">
      <div class="flexslider" id="mainslider">
        <ul class="slides">
        <?php 
              $slide = DB::table('slider')->orderBy('id','DESC')->get();
          ?>
          @foreach($slide as $item_slide)
          <li>
            <img src="{!! asset('resources/upload/slider/'.$item_slide->image) !!}" alt="" />
          </li>
          @endforeach
          
          
        </ul>
      </div>
    </div>
  </section>