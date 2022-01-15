<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Document</title>
<style>
h1,h2,h3,h4,h5,p{
    color:#ffffff;
}

</style>


</head>
<body>
<div class="container bg-light">
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
    <form action="{{url('search')}}" method="POST">
    @csrf
        <div class="w-50 pt-5">
            <div class="input-group mb-5">
                <input type="search" name="itemname" class="form-control rounded" placeholder="Search" aria-label="Search"
                aria-describedby="search-addon" />
                <button type="submit" class="btn btn-outline-primary">search</button>
            </div>
        </div>
    </form>
    

    <div class="row">
        
        <div class="col-md-12 ">
                <div class="w-25 bg-dark p-2 mb-4">
                    <h5 class="text-center">Category 1</h5>
                </div>
                @foreach($category1 as $cat1)
        
                <div class="row mb-5 pl-3" >
                    <div class="col-md-8 p-0" style="background: #142B2A;">
                        <div class="d-flex align-item-center justify-content-between mt-3">
                            
                            <h4 class="d-inline-block bg-light p-2" style="color:black">{{$cat1->name}}</h4>
                            <h4 class="d-inline-block bg-light p-2" style="color:black">Price :  ${{$cat1->price}}</h4>
                        </div>
                        <div class=" w-80 p-2">
                            <h2>Description</h2>
                            <p>{{$cat1->description}}</p>
                        </div>
                    </div>
                    <div class="col-md-4 p-0">
                        <div style="height:100%;width:100%">

                            <img src="{{$cat1->image_url}}" class="img-fluid" style="height:100%" alt="">
                        </div>
                    </div>
                </div>
                @endforeach
            

                <a href="{{url('allitem/1')}}"><div class="w-25 bg-dark p-2 mb-4">
                    <h5 class="text-center">See All Food</h5>
                </div></a>
                
        </div>
    </div>


    <div class="row">
        
        <div class="col-lg-12 ">
                <div class="w-25 bg-dark p-2 mb-4">
                    <h5 class="text-center">Category 2</h5>
                </div>
                @foreach($category2 as $cat2)
                <div class="row mb-5 pl-3" >
                    <div class="col-md-8 p-0" style="background: #142B2A;">
                        <div class="d-flex align-item-center justify-content-between mt-3">
                            
                            <h4 class="d-inline-block bg-light p-2" style="color:black">{{$cat2->name}}</h4>
                            <h4 class="d-inline-block bg-light p-2" style="color:black">Price :  ${{$cat2->price}}</h4>
                        </div>
                        <div class=" w-80 p-2">
                            <h2>Description</h2>
                            <p>{{$cat2->description}}</p>
                        </div>
                    </div>
                    <div class="col-md-4 p-0">
                        <div style="height:100%;width:100%">

                            <img src="{{$cat2->image_url}}" class="img-fluid" style="height:100%" alt="">
                        </div>
                    </div>
                </div>
                @endforeach


                <a href="{{url('allitem/2')}}"><div class="w-25 bg-dark p-2 mb-4">
                    <h5 class="text-center">See All Food</h5>
                </div></a>
                
        </div>
    </div>
        
</div>
    </body>
</html>