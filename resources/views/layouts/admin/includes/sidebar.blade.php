<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{Route::is("admin.home") ? '':'collapsed'}}" href="{{ route("admin.home") }}">
          <i class="bi bi-house"></i>
          <span>Anasayfa</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-gear"></i><span>Ayarlar</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content {{Route::is("admin.settings.index") || Route::is("admin.contacts.index") || Route::is("admin.socialmedia.*") ? '':'collapse'}}" data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('admin.settings.index') }}"  class="nav-link {{Route::is("admin.settings.index")  ? '':'collapsed'}}">
                    <i class="bi bi-circle"></i><span>Genel Ayarlar</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.contacts.index') }}" class="nav-link {{Route::is("admin.contacts.index") ? '':'collapsed'}}">
                    <i class="bi bi-circle"></i><span>İletişim Ayarları</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.socialmedia.list') }}"  class="nav-link {{Route::is("admin.socialmedia.*") ? '':'collapsed'}}">
                    <i class="bi bi-circle"></i><span>Sosyal Medya</span>
                </a>
            </li>
        </ul>
    </li><!-- End Forms Nav -->



      <li class="nav-item ">
        <a class="nav-link {{Route::is("admin.headers.*") ? '':'collapsed'}}" href="{{ route('admin.headers.index') }}">
            <i class="bi bi-card-heading"></i>
          <span>Başlık</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{Route::is("admin.abouts.index") ? '':'collapsed'}}" href="{{ route('admin.abouts.index') }}" >
            <i class="bi bi-file-earmark-person"></i>
          <span>Hakkımızda</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{Route::is("admin.projects.*") ? '':'collapsed'}}" href="{{route('admin.projects.list')}}">
            <i class="bi bi-kanban"></i>
          <span>Yaptığımız İşler (Projeler)</span>
        </a>
      </li>



      <li class="nav-item">
        <a class="nav-link {{Route::is("admin.categories.*") ? '':'collapsed'}}" href="{{route('admin.categories.list')}}">
            <i class="bi bi-inboxes"></i>
          <span>Kategoriler</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{Route::is("admin.products.*") ? '':'collapsed'}}" href="{{route('admin.products.list')}}">
            <i class="bi bi-box-seam"></i>
          <span>Ürünler</span>
        </a>
      </li><!-- End Error 404 Page Nav -->


    </ul>

  </aside><!-- End Sidebar-->
