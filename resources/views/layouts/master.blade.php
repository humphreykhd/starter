<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Zimswitch Starter Project') }}</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('dist/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="{{ asset('dist/Ionicons/css/ionicons.min.css') }}">
    <!-- Checkboxstyling -->
    <link rel="stylesheet" href="{{ asset('css/styleadmin.css') }}">
    <!-- Datatables -->
    <link rel="stylesheet" href="{{ asset('dist/plugins/datatables/jquery.dataTables.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/plugins/datatables/jquery.dataTables_themeroller.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-switch.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="{{ url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700') }}" rel="stylesheet">
</head>
<body class="sidebar-mini">
<div id="wrapper">
    <!-- Main Header -->
    @include('layouts.header')
            <!-- Sidebar -->
    @include('layouts.sidebar')
    @yield('content')
            <!-- /.content-wrapper -->
    <!-- Footer -->
    @include('layouts.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('dist/plugins/jQuery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('dist/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('dist/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('dist/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('js/bootstrap-switch.js') }}"></script>

<!-- AdminLTE -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>

<!-- OPTIONAL SCRIPTS -->
{{--<script src="{{ asset('dist/plugins/chart.js/Chart.min.js') }}"></script>--}}
<script src="{{ asset('dist/js/demo.js') }}"></script>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'introtext',
            {
                toolbar :
                        [
                            { name: 'document', items : [ 'Source','-','Preview','Print','-','Templates' ] },
                            { name: 'basicstyles', items : [ 'Bold','Italic' ] },
                            { name: 'insert', items : [ 'Image','Table','HorizontalRule','Smiley','SpecialChar','PageBreak' ] },
                            { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','SpellChecker' ] },
                            { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote',
                                '-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'] },
                            { name: 'styles', items : [ 'Styles','Format','Font','FontSize'] }
                        ]
            });
    CKEDITOR.replace( 'fulltext',
            {
                toolbar :
                        [
                            { name: 'document', items : [ 'Source','-','Preview','Print','-','Templates' ] },
                            { name: 'basicstyles', items : [ 'Bold','Italic' ] },
                            { name: 'insert', items : [ 'Image','Table','HorizontalRule','Smiley','SpecialChar','PageBreak' ] },
                            { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','SpellChecker' ] },
                            { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote',
                                '-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'] },
                            { name: 'styles', items : [ 'Styles','Format','Font','FontSize'] }

                        ]
            });
    CKEDITOR.replace( 'description',
            {
                toolbar :
                        [
                            { name: 'document', items : [ 'Source','-','Preview','Print','-','Templates' ] },
                            { name: 'basicstyles', items : [ 'Bold','Italic' ] },
                            { name: 'insert', items : [ 'Image','Table','HorizontalRule','Smiley','SpecialChar','PageBreak' ] },
                            { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','SpellChecker' ] },
                            { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote',
                                '-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'] },
                            { name: 'styles', items : [ 'Styles','Format','Font','FontSize'] }
                        ]
            });
</script>
<!-- page script -->
<script type="application/javascript">
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>

<script type="application/javascript">
    $("[name='isActive']").bootstrapSwitch('state', true);
</script>

<script>
    $(function () {
        $("#batches").DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": true,
        });
        $("#batchupload").DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": false,
            "autoWidth": true,
        });
        $("#members").DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": true,
        });
        $("#merchants").DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": true,
        });
        $("#roles").DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": true,
        });
        $("#permissions").DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": true,
        });
        $('#users').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": true,
        });
    });
</script>
{{--Delete Batch Modal--}}
<script>
    $('#deleteModal').on('show.bs.modal', function (event){

//        console.log('Modal Opened');
        var button = $(event.relatedTarget) //Button that triggered the modal
        var batchid = button.data('mybatchid') //Extract info from data * attributes

        var modal = $(this)
//        modal.find('.modal-title').text('New Message to' + recipient)
        modal.find('.modal-body #batchid').val(batchid)

        document.getElementById('batchid').innerHTML = batchid;
    })
</script>
<script>
    {{--Delete Merchant Modal--}}
    $('#deleteMerchantModal').on('show.bs.modal', function (event){

//        console.log('Modal Opened');
        var button = $(event.relatedTarget) //Button that triggered the modal
        var id = button.data('merchantid') //Extract info from data * attributes

        var modal = $(this)
//        modal.find('.modal-title').text('New Message to' + recipient)
        modal.find('.modal-body #id').val(id)

        document.getElementById('id').innerHTML = id;
    })
</script>
<script>
    {{--Authorize Batch Modal--}}
    $('#authorizeBatchModal').on('show.bs.modal', function (event){

//        console.log('Modal Opened');
        var button = $(event.relatedTarget) //Button that triggered the modal
        var batch_id = button.data('mybatch_id') //Extract info from data * attributes

        var modal = $(this)
//        modal.find('.modal-title').text('New Message to' + recipient)
        modal.find('.modal-body #batch_id').val(batch_id)
    })
</script>
<script>
    {{--Delete Member Modal--}}
    $('#deleteMemberModal').on('show.bs.modal', function (event){

//        console.log('Modal Opened');
        var button = $(event.relatedTarget) //Button that triggered the modal

        var button2 = $(event.relatedTarget) //Button that triggered the modal

        var member_id = button.data('member_id') //Extract info from data * attributes

        var membername = button2.data('membername') //Extract info from data * attributes

        var modal = $(this)
//        modal.find('.modal-title').text('New Message to' + recipient)
        modal.find('.modal-body #member_id').val(member_id)

        document.getElementById('membername').innerHTML = membername;

        document.getElementById('member_id').innerHTML = member_id;
    })

</script>
<script>

    //    Delete User Modal

    $('#deleteUserModal').on('show.bs.modal', function (event){

//        console.log('Modal Opened');
        var button = $(event.relatedTarget) //Button that triggered the modal

        var button2 = $(event.relatedTarget) //Button that triggered the modal

        var username = button2.data('username') //Extract info from data * attributes

        var userid = button.data('userid') //Extract info from data * attributes



        var modal = $(this)
//        modal.find('.modal-title').text('New Message to' + recipient)
        modal.find('.modal-body #userid').val(userid)

        document.getElementById('username').innerHTML = username;

        document.getElementById('userid').innerHTML = userid;


    })
</script>

<script>

    //    Delete Role Modal

    $('#deleteRoleModal').on('show.bs.modal', function (event){

//        console.log('Modal Opened');
        var button = $(event.relatedTarget) //Button that triggered the modal

        var button2 = $(event.relatedTarget) //Button that triggered the modal

        var rolename = button2.data('rolename') //Extract info from data * attributes

        var role_id = button.data('role_id') //Extract info from data * attributes



        var modal = $(this)
//        modal.find('.modal-title').text('New Message to' + recipient)
        modal.find('.modal-body #role_id').val(role_id)

        document.getElementById('rolename').innerHTML = rolename;

        document.getElementById('role_id').innerHTML = role_id;


    })
</script>

<script>

    //    Rejected Terminal Modal

    $('#rejectTerminalModal').on('show.bs.modal', function (event){

//        console.log('Modal Opened');
        var button = $(event.relatedTarget) //Button that triggered the modal

        var button2 = $(event.relatedTarget) //Button that triggered the modal

        var terminal = button2.data('terminal') //Extract info from data * attributes

        var terminalid = button.data('terminalid') //Extract info from data * attributes



        var modal = $(this)
//        modal.find('.modal-title').text('New Message to' + recipient)
        modal.find('.modal-body #terminalid').val(terminalid)

        document.getElementById('terminalid').innerHTML = terminalid;

        document.getElementById('terminal').innerHTML = terminal;


    })
</script>

<script>

    //    Correct Terminal Modal

    $('#correctTerminalModal').on('show.bs.modal', function (event){

//        console.log('Modal Opened');
        var button = $(event.relatedTarget) //Button that triggered the modal

        var button2 = $(event.relatedTarget) //Button that triggered the modal

        var tml = button2.data('tml') //Extract info from data * attributes

        var tid = button.data('tid') //Extract info from data * attributes



        var modal = $(this)
//        modal.find('.modal-title').text('New Message to' + recipient)
        modal.find('.modal-body #tid').val(tid)

        document.getElementById('tid').innerHTML = tid;

        document.getElementById('tml').innerHTML = tml;


    })
</script>

<script>

    //    View Merchant Modal

    $('#viewMerchantModal').on('show.bs.modal', function (event){

//        console.log('Modal Opened');
        var button = $(event.relatedTarget) //Button that triggered the modal

        var merchant_code = button.data('merchant_code') //Extract info from data * attributes

        var merchantid = button.data('merchantid') //Extract info from data * attributes

        var terminal_id = button.data('terminal_id') //Extract info from data * attributes

        var card_acceptor_id = button.data('card_acceptor_id') //Extract info from data * attributes

        var mcc = button.data('mcc') //Extract info from data * attributes

        var status = button.data('status') //Extract info from data * attributes

        var approved_by = button.data('approved_by') //Extract info from data * attributes



        var modal = $(this)
//        modal.find('.modal-title').text('New Message to' + recipient)
        modal.find('.modal-body #merchantid').val(merchantid)

        document.getElementById('merchantid').innerHTML = merchantid;

        document.getElementById('merchant_code').innerHTML = merchant_code;

        document.getElementById('terminal_id').innerHTML = terminal_id;

        document.getElementById('card_acceptor_id').innerHTML = card_acceptor_id;

        document.getElementById('mcc').innerHTML = mcc;

        document.getElementById('status').innerHTML = status;

        document.getElementById('approved_by').innerHTML = approved_by;


    })
</script>

<script>

    //    View Terminal Modal

    $('#viewTerminalModal').on('show.bs.modal', function (event){

//        console.log('Modal Opened');
        var button = $(event.relatedTarget) //Button that triggered the modal

        var terminalid = button.data('terminalid') //Extract info from data * attributes

        var terminal_id = button.data('terminal_id') //Extract info from data * attributes

        var merchant_id = button.data('merchant_id') //Extract info from data * attributes

        var card_acceptor_id = button.data('card_acceptor_id') //Extract info from data * attributes

        var mcc = button.data('mcc') //Extract info from data * attributes

        var acquirer_id = button.data('acquirer_id') //Extract info from data * attributes

        var created = button.data('created') //Extract info from data * attributes



        var modal = $(this)
//        modal.find('.modal-title').text('New Message to' + recipient)
        modal.find('.modal-body #terminalid').val(terminalid)

        document.getElementById('terminal_id').innerHTML = terminal_id;

        document.getElementById('merchant_id').innerHTML = merchant_id;

        document.getElementById('card_acceptor_id').innerHTML = card_acceptor_id;

        document.getElementById('mcc').innerHTML = mcc;

        document.getElementById('acquirer_id').innerHTML = acquirer_id;

        document.getElementById('created').innerHTML = created;

    })
</script>

<script>

    //    Delete Permission Modal

    $('#deletePermissionModal').on('show.bs.modal', function (event){

//        console.log('Modal Opened');
        var button = $(event.relatedTarget) //Button that triggered the modal

        var button2 = $(event.relatedTarget) //Button that triggered the modal

        var permissionname = button2.data('permissionname') //Extract info from data * attributes

        var permission_id = button.data('permission_id') //Extract info from data * attributes



        var modal = $(this)
//        modal.find('.modal-title').text('New Message to' + recipient)
        modal.find('.modal-body #permission_id').val(permission_id)

        document.getElementById('permissionname').innerHTML = permissionname;

        document.getElementById('permission_id').innerHTML = permission_id;


    })
</script>

<script>

    //    Delete Content Modal

    $('#deleteContentModal').on('show.bs.modal', function (event){

//        console.log('Modal Opened');
        var button = $(event.relatedTarget) //Button that triggered the modal

        var button2 = $(event.relatedTarget) //Button that triggered the modal

        var articleid = button2.data('articleid') //Extract info from data * attributes

        var articletitle = button.data('articletitle') //Extract info from data * attributes



        var modal = $(this)
//        modal.find('.modal-title').text('New Message to' + recipient)
        modal.find('.modal-body #articleid').val(articleid)

        document.getElementById('articletitle').innerHTML = articletitle;



    })
</script>

<script>

    //    Delete Category Modal

    $('#deleteCategoryModal').on('show.bs.modal', function (event){

//        console.log('Modal Opened');
        var button = $(event.relatedTarget) //Button that triggered the modal

        var button2 = $(event.relatedTarget) //Button that triggered the modal

        var categoryid = button2.data('categoryid') //Extract info from data * attributes

        var categoryname = button.data('categoryname') //Extract info from data * attributes



        var modal = $(this)
//        modal.find('.modal-title').text('New Message to' + recipient)
        modal.find('.modal-body #categoryid').val(categoryid)

        document.getElementById('categoryname').innerHTML = categoryname;



    })
</script>

<script>

    //    Delete Section Modal

    $('#deleteSectionModal').on('show.bs.modal', function (event){

//        console.log('Modal Opened');
        var button = $(event.relatedTarget) //Button that triggered the modal

        var button2 = $(event.relatedTarget) //Button that triggered the modal

        var sectionid = button2.data('sectionid') //Extract info from data * attributes

        var sectiontitle = button.data('sectiontitle') //Extract info from data * attributes



        var modal = $(this)
//        modal.find('.modal-title').text('New Message to' + recipient)
        modal.find('.modal-body #sectionid').val(sectionid)

        document.getElementById('sectiontitle').innerHTML = sectiontitle;



    })

    //    Delete Banner Modal

    $('#deleteBannerModal').on('show.bs.modal', function (event){

//        console.log('Modal Opened');
        var button = $(event.relatedTarget) //Button that triggered the modal

        var button2 = $(event.relatedTarget) //Button that triggered the modal

        var bannerid = button2.data('bannerid') //Extract info from data * attributes

        var bannername = button.data('bannername') //Extract info from data * attributes



        var modal = $(this)
//        modal.find('.modal-title').text('New Message to' + recipient)
        modal.find('.modal-body #bannerid').val(bannerid)

        document.getElementById('bannername').innerHTML = bannername;



    })

    //    Delete BatchStatus Modal

    $('#deleteBatchstatusModal').on('show.bs.modal', function (event){

//        console.log('Modal Opened');
        var button = $(event.relatedTarget) //Button that triggered the modal

        var button2 = $(event.relatedTarget) //Button that triggered the modal

        var batchstatus = button2.data('batchstatus') //Extract info from data * attributes

        var batchstatusid = button.data('batchstatusid') //Extract info from data * attributes



        var modal = $(this)
//        modal.find('.modal-title').text('New Message to' + recipient)
        modal.find('.modal-body #batchstatusid').val(batchstatusid)

        document.getElementById('batchstatus').innerHTML = batchstatus;



    })

    //    Delete Merchant Category Code Modal

    $('#deleteMccModal').on('show.bs.modal', function (event){

//        console.log('Modal Opened');
        var button = $(event.relatedTarget) //Button that triggered the modal

        var mcc = button.data('mcc') //Extract info from data * attributes

        var modal = $(this)
//        modal.find('.modal-title').text('New Message to' + recipient)
        modal.find('.modal-body #mcc').val(mcc)
        document.getElementById('mcc').innerHTML = mcc;

    })


    //    Delete Merchant Status Modal

    $('#deleteMerchantstatusesModal').on('show.bs.modal', function (event){

//        console.log('Modal Opened');
        var button = $(event.relatedTarget) //Button that triggered the modal

        var merchantstatusid = button.data('merchantstatusid') //Extract info from data * attributes

        var merchantstatus = button.data('merchantstatus') //Extract info from data * attributes

        var modal = $(this)
//        modal.find('.modal-title').text('New Message to' + recipient)
        modal.find('.modal-body #merchantstatusid').val(merchantstatusid)

        document.getElementById('merchantstatus').innerHTML = merchantstatus;

    })


</script>
<script>
    /*!
     * AdminLTE v3.0.0-alpha.2 (https://adminlte.io)
     * Copyright 2014-2018 Abdullah Almsaeed <abdullah@almsaeedstudio.com>
     * Licensed under MIT (https://github.com/almasaeed2010/AdminLTE/blob/master/LICENSE)
     */
    !function(e,t){"object"==typeof exports&&"undefined"!=typeof module?t(exports):"function"==typeof define&&define.amd?define(["exports"],t):t(e.adminlte={})}(this,function(e){"use strict";var i,t,o,n,r,a,s,c,f,l,u,d,h,p,_,g,y,m,v,C,D,E,A,O,w,b,L,S,j,T,I,Q,R,P,x,B,M,k,H,N,Y,U,V,G,W,X,z,F,q,J,K,Z,$,ee,te,ne="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},ie=function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")},oe=(i=jQuery,t="ControlSidebar",o="lte.control.sidebar",n=i.fn[t],r=".control-sidebar",a='[data-widget="control-sidebar"]',s=".main-header",c="control-sidebar-open",f="control-sidebar-slide-open",l={slide:!0},u=function(){function n(e,t){ie(this,n),this._element=e,this._config=this._getConfig(t)}return n.prototype.show=function(){this._config.slide?i("body").removeClass(f):i("body").removeClass(c)},n.prototype.collapse=function(){this._config.slide?i("body").addClass(f):i("body").addClass(c)},n.prototype.toggle=function(){this._setMargin(),i("body").hasClass(c)||i("body").hasClass(f)?this.show():this.collapse()},n.prototype._getConfig=function(e){return i.extend({},l,e)},n.prototype._setMargin=function(){i(r).css({top:i(s).outerHeight()})},n._jQueryInterface=function(t){return this.each(function(){var e=i(this).data(o);if(e||(e=new n(this,i(this).data()),i(this).data(o,e)),"undefined"===e[t])throw new Error(t+" is not a function");e[t]()})},n}(),i(document).on("click",a,function(e){e.preventDefault(),u._jQueryInterface.call(i(this),"toggle")}),i.fn[t]=u._jQueryInterface,i.fn[t].Constructor=u,i.fn[t].noConflict=function(){return i.fn[t]=n,u._jQueryInterface},u),re=(d=jQuery,h="Layout",p="lte.layout",_=d.fn[h],g=".main-sidebar",y=".main-header",m=".content-wrapper",v=".main-footer",C="hold-transition",D=function(){function n(e){ie(this,n),this._element=e,this._init()}return n.prototype.fixLayoutHeight=function(){var e={window:d(window).height(),header:d(y).outerHeight(),footer:d(v).outerHeight(),sidebar:d(g).height()},t=this._max(e);d(m).css("min-height",t-e.header),d(g).css("min-height",t-e.header)},n.prototype._init=function(){var e=this;d("body").removeClass(C),this.fixLayoutHeight(),d(g).on("collapsed.lte.treeview expanded.lte.treeview collapsed.lte.pushmenu expanded.lte.pushmenu",function(){e.fixLayoutHeight()}),d(window).resize(function(){e.fixLayoutHeight()}),d("body, html").css("height","auto")},n.prototype._max=function(t){var n=0;return Object.keys(t).forEach(function(e){t[e]>n&&(n=t[e])}),n},n._jQueryInterface=function(t){return this.each(function(){var e=d(this).data(p);e||(e=new n(this),d(this).data(p,e)),t&&e[t]()})},n}(),d(window).on("load",function(){D._jQueryInterface.call(d("body"))}),d.fn[h]=D._jQueryInterface,d.fn[h].Constructor=D,d.fn[h].noConflict=function(){return d.fn[h]=_,D._jQueryInterface},D),ae=(E=jQuery,A="PushMenu",w="."+(O="lte.pushmenu"),b=E.fn[A],L={COLLAPSED:"collapsed"+w,SHOWN:"shown"+w},S={screenCollapseSize:768},j={TOGGLE_BUTTON:'[data-widget="pushmenu"]',SIDEBAR_MINI:".sidebar-mini",SIDEBAR_COLLAPSED:".sidebar-collapse",BODY:"body",OVERLAY:"#sidebar-overlay",WRAPPER:".wrapper"},T="sidebar-collapse",I="sidebar-open",Q=function(){function n(e,t){ie(this,n),this._element=e,this._options=E.extend({},S,t),E(j.OVERLAY).length||this._addOverlay()}return n.prototype.show=function(){E(j.BODY).addClass(I).removeClass(T);var e=E.Event(L.SHOWN);E(this._element).trigger(e)},n.prototype.collapse=function(){E(j.BODY).removeClass(I).addClass(T);var e=E.Event(L.COLLAPSED);E(this._element).trigger(e)},n.prototype.toggle=function(){(E(window).width()>=this._options.screenCollapseSize?!E(j.BODY).hasClass(T):E(j.BODY).hasClass(I))?this.collapse():this.show()},n.prototype._addOverlay=function(){var e=this,t=E("<div />",{id:"sidebar-overlay"});t.on("click",function(){e.collapse()}),E(j.WRAPPER).append(t)},n._jQueryInterface=function(t){return this.each(function(){var e=E(this).data(O);e||(e=new n(this),E(this).data(O,e)),t&&e[t]()})},n}(),E(document).on("click",j.TOGGLE_BUTTON,function(e){e.preventDefault();var t=e.currentTarget;"pushmenu"!==E(t).data("widget")&&(t=E(t).closest(j.TOGGLE_BUTTON)),Q._jQueryInterface.call(E(t),"toggle")}),E.fn[A]=Q._jQueryInterface,E.fn[A].Constructor=Q,E.fn[A].noConflict=function(){return E.fn[A]=b,Q._jQueryInterface},Q),se=(R=jQuery,P="Treeview",B="."+(x="lte.treeview"),M=R.fn[P],k={SELECTED:"selected"+B,EXPANDED:"expanded"+B,COLLAPSED:"collapsed"+B,LOAD_DATA_API:"load"+B},H=".nav-item",N=".nav-treeview",Y=".menu-open",V="menu-open",G={trigger:(U='[data-widget="treeview"]')+" "+".nav-link",animationSpeed:300,accordion:!0},W=function(){function i(e,t){ie(this,i),this._config=t,this._element=e}return i.prototype.init=function(){this._setupListeners()},i.prototype.expand=function(e,t){var n=this,i=R.Event(k.EXPANDED);if(this._config.accordion){var o=t.siblings(Y).first(),r=o.find(N).first();this.collapse(r,o)}e.slideDown(this._config.animationSpeed,function(){t.addClass(V),R(n._element).trigger(i)})},i.prototype.collapse=function(e,t){var n=this,i=R.Event(k.COLLAPSED);e.slideUp(this._config.animationSpeed,function(){t.removeClass(V),R(n._element).trigger(i),e.find(Y+" > "+N).slideUp(),e.find(Y).removeClass(V)})},i.prototype.toggle=function(e){var t=R(e.currentTarget),n=t.next();if(n.is(N)){e.preventDefault();var i=t.parents(H).first();i.hasClass(V)?this.collapse(R(n),i):this.expand(R(n),i)}},i.prototype._setupListeners=function(){var t=this;R(document).on("click",this._config.trigger,function(e){t.toggle(e)})},i._jQueryInterface=function(n){return this.each(function(){var e=R(this).data(x),t=R.extend({},G,R(this).data());e||(e=new i(R(this),t),R(this).data(x,e)),"init"===n&&e[n]()})},i}(),R(window).on(k.LOAD_DATA_API,function(){R(U).each(function(){W._jQueryInterface.call(R(this),"init")})}),R.fn[P]=W._jQueryInterface,R.fn[P].Constructor=W,R.fn[P].noConflict=function(){return R.fn[P]=M,W._jQueryInterface},W),ce=(X=jQuery,z="Widget",q="."+(F="lte.widget"),J=X.fn[z],K={EXPANDED:"expanded"+q,COLLAPSED:"collapsed"+q,REMOVED:"removed"+q},$="collapsed-card",ee={animationSpeed:"normal",collapseTrigger:(Z={DATA_REMOVE:'[data-widget="remove"]',DATA_COLLAPSE:'[data-widget="collapse"]',CARD:".card",CARD_HEADER:".card-header",CARD_BODY:".card-body",CARD_FOOTER:".card-footer",COLLAPSED:".collapsed-card"}).DATA_COLLAPSE,removeTrigger:Z.DATA_REMOVE},te=function(){function n(e,t){ie(this,n),this._element=e,this._parent=e.parents(Z.CARD).first(),this._settings=X.extend({},ee,t)}return n.prototype.collapse=function(){var e=this;this._parent.children(Z.CARD_BODY+", "+Z.CARD_FOOTER).slideUp(this._settings.animationSpeed,function(){e._parent.addClass($)});var t=X.Event(K.COLLAPSED);this._element.trigger(t,this._parent)},n.prototype.expand=function(){var e=this;this._parent.children(Z.CARD_BODY+", "+Z.CARD_FOOTER).slideDown(this._settings.animationSpeed,function(){e._parent.removeClass($)});var t=X.Event(K.EXPANDED);this._element.trigger(t,this._parent)},n.prototype.remove=function(){this._parent.slideUp();var e=X.Event(K.REMOVED);this._element.trigger(e,this._parent)},n.prototype.toggle=function(){this._parent.hasClass($)?this.expand():this.collapse()},n.prototype._init=function(e){var t=this;this._parent=e,X(this).find(this._settings.collapseTrigger).click(function(){t.toggle()}),X(this).find(this._settings.removeTrigger).click(function(){t.remove()})},n._jQueryInterface=function(t){return this.each(function(){var e=X(this).data(F);e||(e=new n(X(this),e),X(this).data(F,"string"==typeof t?e:t)),"string"==typeof t&&t.match(/remove|toggle/)?e[t]():"object"===("undefined"==typeof t?"undefined":ne(t))&&e._init(X(this))})},n}(),X(document).on("click",Z.DATA_COLLAPSE,function(e){e&&e.preventDefault(),te._jQueryInterface.call(X(this),"toggle")}),X(document).on("click",Z.DATA_REMOVE,function(e){e&&e.preventDefault(),te._jQueryInterface.call(X(this),"remove")}),X.fn[z]=te._jQueryInterface,X.fn[z].Constructor=te,X.fn[z].noConflict=function(){return X.fn[z]=J,te._jQueryInterface},te);e.ControlSidebar=oe,e.Layout=re,e.PushMenu=ae,e.Treeview=se,e.Widget=ce,Object.defineProperty(e,"__esModule",{value:!0})});
    //# sourceMappingURL=adminlte.min.js.map

</script>


</body>
</html>
