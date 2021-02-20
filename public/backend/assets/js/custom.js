(function ($) {
    $(document).ready(function(){

        // All role
        function allRolesData(){
            $.ajax({
                url : 'allrole',
                success : function(data){
                    $('#roles_body').html(data);
                }

            });
        }

        allRolesData();
        // Logout Features
        $('.logout-cls').click(function(e){
            e.preventDefault();

            $('#logout_form').submit();
        });


        // Show add role modal
        $('#add_btn_role').click(function(e){
            e.preventDefault();
            $('#add_modal_role').modal('show');
        });

        // role status
        $(document).on('click', '#role_status_btn', function(e){
            e.preventDefault();

            let id = $(this).attr('status_id');

            $.ajax({
                url : 'role-status-update/' + id,
                success : function(data){
                    allRolesData();
                }
            });

        });

        // Edit modal show
        $(document).on('click', '#edit_role_btn', function(e){
            e.preventDefault();
            let id = $(this).attr('edit_id');

            $.ajax({
                url : 'role-edit-data/' + id,
                success : function(data){


                    $('#edit_modal_role input[name="name"]').val(data.name);
                    $('#edit_modal_role input[name="update_id"]').val(data.id);
                    $('#edit_modal_role  .role-box').html(data.permission);
                    $('#edit_modal_role').modal('show');
                }
            });


            // Role update
            $('#role_update_form').submit(function(e){
                e.preventDefault();

                $.ajax({
                    url : 'role-update-data',
                    method : 'POST',
                    data : new FormData(this),
                    contentType : false,
                    processData : false,
                    success : function(data){
                        allRolesData();
                        $('#edit_modal_role').modal('hide');


                        let msg = setInterval(function () {
                            swal({
                                title : 'Updated',
                                text : 'Role updated successful',
                                icon    : 'success',
                                dangerMode : false,
                            });

                            clearInterval(msg);

                        }, 1000);


                    }

                });

            });




        });


        // Delete Role
        $(document).on('click', '#delete_role_btn', function(e){
            e.preventDefault();
            let id = $(this).attr('delete_id');

            swal({
                title   : 'Delete',
                text    : 'Are you sure ?',
                buttons : ['Cancel','Delete'],
                dangerMode : true
            }).then((ghotona) => {

                if(ghotona){

                    $.ajax({
                        url : 'role-delete/' + id ,
                        success : function(data){
                            if(data){
                                allRolesData();
                                swal({
                                    title   : 'Deleted',
                                    text    : 'Role deleted successfull',
                                    icon    : 'success'
                                });
                            }
                        }
                    });

                }else{
                    swal('Data Safe');
                }

            });

        });



        // User add modal show
        $('#add_user_btn').click(function(e){
            e.preventDefault();

            $('#add_user_modal').modal('show');

        });


        // User data store
        $('#add_user_form').submit(function (e) {
            e.preventDefault();


            $.ajax({
                url : 'user-store',
                method : 'POST',
                data    : new FormData(this),
                contentType: false,
                processData: false,
                success : function(data){

                    if( data ){
                        $('#add_user_modal').modal('hide');
                        swal('Success', 'Account created successful', 'success');
                    }


                }
            });


        });

        // Show all users
        allUsers();
        function allUsers(){
            $.ajax({
                url : 'all-users',
                success : function(data){
                    $('#allUserTable').html(data);
                }
            });
        }

        // Edit Modal users
        $(document).on('click', '#edit_user_btn', function(e){
            e.preventDefault();

            let id = $(this).attr('edit_id');

            $.ajax({
                url : 'edit-user/' + id ,
                success : function(data){

                    $('#edit_user_modal input[name="fname"]').val(data.name);
                    $('#edit_user_modal input[name="email"]').val(data.email);
                    $('#edit_user_modal input[name="cell"]').val(data.cell);
                    $('#edit_user_modal input[name="uname"]').val(data.uname);
                    $('#edit_user_modal .user-gender ').html(data.gender);
                    $('#edit_user_modal #edu-user').html(data.edu);
                    $('#edit_user_modal').modal('show');

                }
            });





        });



    });
})(jQuery)
