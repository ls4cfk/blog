<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>

<style>

body {
    background-color: #eee
}

.bdge {
    height: 21px;
    background-color: orange;
    color: #fff;
    font-size: 11px;
    padding: 8px;
    border-radius: 4px;
    line-height: 3px
}

.comments {
    text-decoration: underline;
    text-underline-position: under;
    cursor: pointer
}

.dot {
    height: 7px;
    width: 7px;
    margin-top: 3px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block
}

.hit-voting:hover {
    color: blue
}

.hit-voting {
    cursor: pointer
}

</style>


</head>
<body>

<div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
        
        <div class="d-flex flex-column col-md-8">
            <div class="text-center mb-3">
                <h2>POSTS</h2>
            </div>    

            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                </div>
                @endif

                @if(Session::has('error'))
                <div class="alert alert-danger" role="alert">
                {{Session::get('error')}}
                </div>
                @endif

            @foreach($post as $post)
            
            
          <a href="{{url('fullpost/'.$post->id)}}">  <div class="d-flex flex-row align-items-center text-left comment-top p-2 bg-white border-bottom px-4">
                <div class="profile-image"><img class="rounded-circle" src="https://coursebari.com/wp-content/uploads/2021/06/899048ab0cc455154006fdb9676964b3.jpg" width="70"></div>
                <div class="d-flex flex-column-reverse flex-grow-0 align-items-center votings ml-1"></div>
                <div class="d-flex flex-column ml-3">
                    <div class="d-flex flex-row post-title">
                        <h5>{{$post->posting_description}}</h5><span class="ml-2">(Admin)</span>
                    </div>
                    </div>
            </div></a>
            <form action="{{url('savecomment')}}" method="POST">
            @csrf
            <div class="coment-bottom bg-white p-2 px-4 mb-4">
            
                <div class="d-flex flex-row add-comment-section mt-4 mb-4">
                    <img class="img-fluid img-responsive rounded-circle mr-2" src="https://coursebari.com/wp-content/uploads/2021/06/899048ab0cc455154006fdb9676964b3.jpg" width="38">
                    <input type="text" class="form-control mr-3" name="commenttext" placeholder="Add comment">
                    <input type="text" class="form-control mr-3" name="username" placeholder="Username">
                    <input type="hidden"  name="postid" value="{{$post->id}}">
                    <button type="submit" class="btn btn-primary">Comment</button>
                </div>
           

            </div>
                
           
            </form>

            @endforeach
            
            
        </div>
       
    </div>
</div>
    
</body>
</html>