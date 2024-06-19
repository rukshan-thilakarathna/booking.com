<?php
$activeTabSign = "";
$activeTabRegister = "";

if( $_POST['tab'] == '#tab-sign-in' ){
    $activeTabSign = "active in";
}
elseif ( $_POST['tab'] == '#tab-register' ){
    $activeTabRegister = "active in";
}

if( $_POST['tab'] == '#tab-sign-in' || $_POST['tab'] == '#tab-register' ){
    echo
        '<div class="modal fade" id="sign-in-register-modal" tabindex="-1" role="dialog" aria-labelledby="sign-in-register-modal">
            <div class="wrapper">
                <div class="inner">
                    <div class="modal-dialog width-400px" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab-sign-in" aria-controls="tab-sign-in" role="tab" data-toggle="tab"><h1>Sign In</h1></a></li>
                                    <li role="presentation"><a href="#tab-register" aria-controls="tab-register" role="tab" data-toggle="tab"><h1>Register</h1></a></li>
                                </ul>
                            </div>
                            <!--end modal-header-->
                            <div class="modal-body">
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade '. $activeTabSign .'" id="tab-sign-in">
                                    <form id="form-sign">
                                        <div class="form-group">
                                            <label for="form-sign-in-email">E-mail</label>
                                            <input type="text" class="form-control" id="form-sign-in-email" name="sign_in_email" placeholder="Login E-mail">
                                        </div>
                                        <!--end form-group-->
                                        <div class="form-group">
                                            <label for="form-sign-in-password">Password</label>
                                            <input type="password" class="form-control" id="form-sign-in-password" name="sign_in_password" placeholder="*****">
                                        </div>
                                        <!--end form-group-->
                                        <div class="clearfix action">
                                            <div class="form-group pull-right">
                                                <button type="submit" class="btn btn-primary btn-rounded">Sign In</button>
                                            </div>
                                            <div class="form-group pull-left">
                                                <label><input type="checkbox" name="1">Login Automatically</label>
                                            </div>
                                        </div>
                                        <!--end action-->
                                    </form>
                                    <!--end form-sign-in-->
                                </div>
                                <div role="tabpanel" class="tab-pane fade '. $activeTabRegister .'" id="tab-register">
                                    <form id="form-register">
                                        <div class="form-group">
                                            <label for="form-register-name">Name</label>
                                            <input type="text" class="form-control" id="form-register-name" name="register_name" placeholder="John">
                                        </div>
                                        <!--end form-group-->
                                        <div class="form-group">
                                            <label for="form-register-surname">Surname</label>
                                            <input type="text" class="form-control" id="form-register-surname" name="register_surname" placeholder="Doe">
                                        </div>
                                        <!--end form-group-->
                                        <div class="form-group">
                                            <label for="form-register-email">E-mail</label>
                                            <input type="text" class="form-control" id="form-register-email" name="register_email" placeholder="Login E-mail">
                                        </div>
                                        <!--end form-group-->
                                        <div class="form-group">
                                            <label for="form-register-password">Password</label>
                                            <input type="password" class="form-control" id="form-register-password" name="register_password" placeholder="*****">
                                        </div>
                                        <!--end form-group-->
                                        <div class="clearfix action">
                                            <div class="form-group pull-right">
                                                <button type="submit" class="btn btn-primary btn-rounded">Sign In</button>
                                            </div>
                                            <div class="form-group pull-left">
                                                <label><input type="checkbox" name="1">Login Automatically</label>
                                            </div>
                                        </div>
                                        <!--end action-->
                                    </form>
                                    <!--end form-sign-in-->
                                </div>
                            </div>

                        </div>
                        <!--end modal-body-->
                        <div class="modal-footer">
                            <div class="center">
                                <div>Lost Password? <a href="#">Reset here</a></div>
                                <div>New to Accommondo? <a href="#">Register an account</a></div>
                            </div>
                        </div>
                        <!--end modal-footer-->
                    </div>
                    <!--end modal-content-->
                </div>
                <!--end modal-dialog-->
            </div>
        </div>
    </div>';
}
