<div class="left-side sticky-left-side">

    <!--logo and iconic logo start-->
    <div class="logo">
        <h1><a href="index.html">Easy <span>Admin</span></a></h1>
    </div>
    <div class="logo-icon text-center">
        <a href="{{route('admin.pages.index')}}"><i class="lnr lnr-home"></i> </a>
    </div>

    <!--logo and iconic logo end-->
    <div class="left-side-inner">

        <!--sidebar nav start-->
        <?php
        ?>
        <ul class="nav nav-pills nav-stacked custom-nav">
            <li><a href="{{route('admin.pages.index')}}"><i class="lnr lnr-power-switch"></i><span>Dashboard</span></a></li>
            <li><a href="{{route('admin.user.getList')}}"><i class="lnr lnr-user"></i> <span>User</span></a></li>
            <li><a href="{{route('admin.subjects.getList')}}"><i class="lnr lnr-book"></i> <span>Subjects</span></a></li>
            <li><a href="{{route('admin.class.getList')}}"><i class="lnr lnr-enter"></i> <span>Class</span></a></li>
            <li><a href="{{route('admin.tutor')}}"><i class="lnr lnr-enter"></i> <span>Tutor</span></a></li>
            <li><a href="{{route('admin.students.getList')}}"><i class="lnr lnr-user"></i><span>Student</span></a></li>
            <li><a href="{{route('admin.tests.getList')}}"><i class="lnr lnr-page-break"></i><span>Test list</span></a></li>
            <li><a href="{{route('admin.question.getList')}}"><i class="lnr lnr-database"></i> <span>Question Bank</span></a></li>
            <li><a href="{{route('admin.post.list')}}"><i class="lnr lnr-database"></i> <span>Post</span></a></li>
            <li><a href="{{route('admin.form.getForm')}}"><i class="lnr lnr-database"></i> <span>Request</span></a></li>
            <li><a href="{{route('admin.user.getAdd')}}"><i class="lnr lnr-database"></i> <span>Add user</span></a></li>
        </ul>
        <!--sidebar nav end-->
    </div>
</div>