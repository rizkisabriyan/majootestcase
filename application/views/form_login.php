<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Majoo Test</h1>
                                    </div>
                                    <?= $this->session->flashdata('pesan')?>
                                    <form method="post" action="<?= base_url('auth/login')?>" class="user">
                                        <div class="form-group">
                                            <input type="name" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Your Username..." name="username">
                                            <?= form_error('username','<div class="text-danger small ml-2">','</div>');?>    
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="password">
                                            <?= form_error('password','<div class="text-danger small ml-2">','</div>');?>
                                        </div>
                                        <button type="submit" class="btn btn-primary form-control">Login</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('register/index')?>">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</html>