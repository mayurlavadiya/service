
@extends('frontend.layouts.main')
@section('main-container')

<!-- start contact Area -->
<section class="contact-area section-gap" id="contact">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-60 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">If you need, Just drop us a line</h1>
                    <p>Who are in extremely love with eco friendly system.</p>
                </div>
            </div>
        </div>
        {{-- <form class="form-area " id="myForm" action="mail.php" method="post" class="contact-form text-right"> --}}

            {!! Form::open([
                'url' => url('storefile'),
                'method' => 'post',
                'id' => 'myform',
                'role' => 'form',
                'class' => 'contact-form',
                'enctype' => 'multipart/form-data'
                ]) !!}
         {{-- @csrf --}}
        <div class="row">
            <div class="col-lg-6 form-group">
                {{-- <input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text"> --}}
                {!! Form::text('name', '',
                ['id' => 'name', 'required' => '', 'placeholder' => 'Enter your name', 'class' => 'common-input mb-20 form-control']) !!}
            </div>
            <div class="col-lg-6 form-group">
                {{-- <input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text"> --}}
                {!! Form::text('email', '',
                ['id' => 'email', 'required' => '', 'placeholder' => 'Enter your email', 'class' => 'common-input mb-20 form-control']) !!}
            </div>
            <div class="col-lg-6 form-group">
                {{-- <input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text"> --}}
                {!! Form::text('contact', '',
                ['id' => 'contact', 'required' => '', 'maxlength' =>10, 'placeholder' => 'Enter your contact number', 'class' => 'common-input mb-20 form-control']) !!}
            </div>
            <div class="col-lg-6 form-group">
                {{-- <input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text"> --}}
                {!! Form::select(
                    'country',[ // 1st parameter
                        'in' => 'India',
                        'pk' => 'Pakistan',
                        'us' => 'America',
                        'sa' => 'South Africa'
                    ],'in',
                    ['placeholder' => 'Select Country','class' => 'common-input mb-20 form-control','required' => '',]);
                    // [           // second and third parameter and so on....
                    //     'id' => 'country', 'required' => '', 'placeholder' => 'Enter your contact number', 'class' => 'common-input mb-20 form-control'
                    // ])
                    !!}
            </div>


            <div class="col-lg-6 form-group">
                <textarea class="common-textarea mt-8 form-control" name="message" placeholder="Enter Your Query or Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
            </div>
        </div>
        <div class="text-center">
            <button class="primary-btn col-md-3 mt-20">Send Message<span class="lnr lnr-arrow-right"></span></button>
        </div>

        <div class="alert-msg">
        </div>
    </div>
        {{-- </form> --}}
        {!! Form::close() !!}

    </div>
</section>
<!-- end contact Area -->
@endsection
