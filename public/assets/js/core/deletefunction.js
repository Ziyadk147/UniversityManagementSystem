$(document).ready(function(){
    $('.delete-button').on('click',function(){
        const address = window.location.pathname.split('/')[1];
        const id = $(this).data('id');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {

            if (result.isConfirmed) {
                $.ajax({
                    url:`/${address}/${id}`,
                    type:'DELETE',
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    },
                    success:function (response){
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success',
                        ).then(() => {
                            location.reload();
                        })
                    },

                    error:function(error){
                        Swal.fire('Not Deleted', '', 'info')
                    }
                })


            }
        })

    })
});
