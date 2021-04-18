@include("head")
    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <h1 class="my-4">Page Heading
            <small>Secondary Text</small>
          </h1>
          <div>
            
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif 

          @if (Session::has('update_success'))
               <div class="alert alert-info">
               {{ Session::get('update_success') }}
              </div>
          @endif
          

          </div>
          <!-- Blog Post -->
          <div class="mb-4">
            <form action="{{ url('update_blog') }}" method="post"  enctype="multipart/form-data" >
            {{ csrf_field() }}
            <input type="hidden" id="" name="id" value="{{ $item_blog->id }}">
              <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" value="{{ $item_blog->blog_title }}" name="blog_title" id="title" >
              </div>
              <div class="form-group">
                <label for="content">Content:</label>
                <textarea class="form-control" name="blog_content" id="content">{{ $item_blog->blog_content }}</textarea>
              </div>
              <div class="form-group">
              @if ("images/{{ $item_blog->blog_image }}")
                  <img src="{{ url('images/'.$item_blog->blog_image) }}" style="width: 100%;">
              @else
                      <p>No image found</p>
              @endif
                <label for="image">Image:</label>
                <input type="file" class="form-control" value="{{ $item_blog->blog_image }}" name="blog_image" id="image" >
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
          </div>


          </ul>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
              </div>
            </div>
          </div>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">Web Design</a>
                    </li>
                    <li>
                      <a href="#">HTML</a>
                    </li>
                    <li>
                      <a href="#">Freebies</a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">JavaScript</a>
                    </li>
                    <li>
                      <a href="#">CSS</a>
                    </li>
                    <li>
                      <a href="#">Tutorials</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
              You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
          </div>

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ url('/vendor/jquery/jquery.min.js') }} "></script>
    <script src="{{ url('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  </body>

</html>
