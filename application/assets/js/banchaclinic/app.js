var app = {
    syncheck(){
        preload.show()
        console.log('Checking ....');
        // Get local lasted sync id 
        var jst = $.post(authen_api + 'sync.php?stage=get_current_syncid', function(){}, 'json')
                   .always(function(snap){
                       console.log(snap);
                       if(snap.status == 'Success'){

                       }else{
                            preload.hide()
                            // Swal.fire({
                            //     title: "เกิดข้อผิดพลาด",
                            //     text: "ยังไม่มีข้อมูลที่ถูกผสาน",
                            //     icon: "error",
                            //     confirmButtonClass: 'btn btn-danger',
                            //     confirmButtonText: 'เริ่มผสานข้อมูล',
                            //     buttonsStyling: false,
                            // });

                            Swal.fire({
                                title: 'ยังไม่มีข้อมูลที่ถูกผสาน',
                                text: "ท่านต้องเริ่มผสานข้อมูลหรือไม่?",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'เริ่มผสานข้อมูล',
                                cancelButtonText: 'ไว้ทีหลัง',
                                confirmButtonClass: 'btn btn-primary',
                                cancelButtonClass: 'btn btn-danger ml-1',
                                buttonsStyling: false,
                              }).then(function (result) {
                                if (result.value) {
                                    preload.show()
                                    var jst = $.post(authen_api + 'sync.php?stage=generate_sync_session', function(){}, 'json')
                                            .always(function(snap){
                                                if(snap.status == 'Success'){
                                                    $sid = snap.data

                                                    var jst2 = $.post(authen_api + 'sync_service.php?stage=sync_up', {sid: $sid}, function(){}, 'json')
                                                               .always(function(snap2){
                                                                   if(snap2.status == 'Success'){
                                                                       preload.hide()
                                                                       Swal.fire({
                                                                        icon: "success",
                                                                        title: 'สำเร็จ',
                                                                        text: 'ข้อมูลถูกผสานเรียบร้อยแล้ว',
                                                                        confirmButtonText: 'รับทราบ',
                                                                        confirmButtonClass: 'btn btn-success',
                                                                    })
                                                                   }else{
                                                                        preload.hide()
                                                                        Swal.fire({
                                                                            icon: "error",
                                                                            title: 'เกิดข้อผิดพลาด',
                                                                            text: 'ไม่สามารถผสานข้อมูลได้ (Code : 1002) กรุณาติดต่อผู้ดูแล',
                                                                            confirmButtonText: 'ลองใหม่',
                                                                            confirmButtonClass: 'btn btn-danger',
                                                                        })
                                                                   }
                                                               })

                                                }else{
                                                    preload.hide()
                                                    Swal.fire({
                                                        icon: "error",
                                                        title: 'เกิดข้อผิดพลาด',
                                                        text: 'ไม่สามารถผสานข้อมูลได้ (Code : 1001) กรุณาติดต่อผู้ดูแล',
                                                        confirmButtonText: 'ลองใหม่',
                                                        confirmButtonClass: 'btn btn-danger',
                                                    })
                                                }
                                            })
                                }
                              })
                       }
                   })



        var syn_url = 'https://banchaclinic.wisnior.com/application/api/sync.php??stage=check';
        var jxr = $.post(syn_url, function(){}, 'json')
                   .always(function(snap){
                       if(snap.status == 'Success'){
                            Swal.fire({
                                title: "สำเร็จ",
                                text: "ข้อมูลถูกผสานเรียบร้อยแล้ว",
                                icon: "success",
                                confirmButtonClass: 'btn btn-success',
                                confirmButtonText: 'รับทราบ',
                                buttonsStyling: false,
                            });
                       }
                   })
    },
    syncro(){
        console.log('Synchronousing ....');
        preload.show()
        var syn_url = 'https://banchaclinic.wisnior.com/application/api/sync.php??stage=sync';
        var jxr = $.post(syn_url, function(){}, 'json')
                   .always(function(snap){
                       if(snap.status == 'Success'){
                            Swal.fire({
                                title: "สำเร็จ",
                                text: "ข้อมูลถูกผสานเรียบร้อยแล้ว",
                                icon: "success",
                                confirmButtonClass: 'btn btn-success',
                                confirmButtonText: 'รับทราบ',
                                buttonsStyling: false,
                            });
                       }
                   })
    }
}