@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   My Requests
                <?php                   
                   foreach($requests as $request){
                ?>

                    <div class="alert alert-success" role="alert">
                    <p>Id Request : <?php echo $request->id ?></p>

                    <h3>location : <?php echo $request->location ?></h3>
                    <p>size : <?php echo $request->size ?></p>
                    <p>weight : <?php echo $request->weight ?></p>
                    <p>pickup : <?php echo $request->pickup ?></p>
                    <p>delivery : <?php echo $request->delivery ?></p>
                    <h3>status : <?php echo $request->status['name_en'] ?></h3>


                    </div>


                    <?php
                   }  
                   ?>

                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
