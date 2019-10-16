<div class="menu">
    <ul class="list">
        <li class="header">MENU UTAMA</li>
        <?php
      $menu_0 = \App\Menus::where('id_induk',0)->get();
      foreach ($menu_0 as $key) {
        get_menu_child($key->id);
      }
      function get_menu_child($parent=0){
        $menu = \App\Menus::where('id_induk',$parent)->get();
        $parent = \App\Menus::where('id',$parent)->first();
        ?>
        <li class="active">
          <a href="{{url($parent->url)}}">
            <i class="material-icons">{{$parent->icon}}</i>
            <span>{{$parent->nama}}</span>
            @if(sizeof($menu)>0)
            <i class="fa fa-angle-left pull-right"></i>
            @endif
          </a>
          @if(sizeof($menu)>0)
          <ul class="treeview-menu">
            <?php
            foreach ($menu as $key) {
              get_menu_child($key->id);
            }
            ?>
          </ul>
          @endif
        </li>
      <?php } ?>
    </ul>
</div>