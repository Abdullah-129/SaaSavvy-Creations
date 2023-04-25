@extends('layout')
@section('title')
    <title>{{__('user.AI History')}}</title>
@endsection
@section('meta')
    <meta name="description" content="{{__('user.AI History')}}">
@endsection

@section('frontend-content')
   <!--==========================
        BREADCRUMB PART START
    ===========================-->
    <div id="breadcrumb_part" style="background: url({{ asset($breadcrumb->image) }});">
        <div class="bread_overlay">
            <div class="img">
                <img src="{{ asset($breadcrumb->foreground_image) }}" alt="breadcrumb" class="img-fluid w-100">
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-white">
                        <h4>{{__('user.AI History')}}</h4>
                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"> {{__('user.Home')}} </a></li>
                                <li class="breadcrumb-item active" aria-current="page"> {{__('user.AI History')}} </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==========================
        BREADCRUMB PART END
    ===========================-->

        <!--=========================
        DASHBOARD START
    ==========================-->
    <section class="wsus__dashboard">
        <div class="container">
            <div class="wsus__dashboard_area">
                <div class="row">
                    @include('user.sidebar')

                    <div class="col-xl-9 col-lg-8">
                        <div class="wsus__dashboard_content">
                            <div class="wsus_dashboard_body">
                                <div class="wsus_dash_ai_history" data-aos="fade-up">
                                    <div class="wsus_dash_ai_history_list">
                                        <h3>{{__('user.AI History')}}</h3>
                                        <div class="table-responsive">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <th class="doc_name">{{__('user.document name')}}</th>
                                                        <th class="doc_words">{{__('user.words')}}</th>
                                                        <th class="doc_date">{{__('user.date')}}</th>
                                                        <th class="doc_action">{{__('user.Action')}}</th>
                                                    </tr>
                                                    @foreach ($ai_histories as $index => $ai_history)
                                                        <tr>
                                                            <td class="doc_name">
                                                                <a href="javascript:;">{{ $ai_history->title }}</a>
                                                            </td>
                                                            <td class="doc_words">
                                                                <p>{{ $ai_history->total_word }}</p>
                                                            </td>
                                                            <td class="doc_date">
                                                                <p>{{ $ai_history->created_at->format('h:i A, d M Y') }}</p>
                                                            </td>
                                                            <td class="doc_action">
                                                                <ul class="d-flex">
                                                                    <li><a data-ai-id="{{ $ai_history->id }}" data-ai-title="{{ $ai_history->title }}" data-ai-history="{{ $ai_history->ai_content }}" class="edit_history"><i
                                                                                class="far fa-edit"></i></a></li>
                                                                    <li><a onclick="deleteDocument('{{ $ai_history->id }}')" class="del_history"><i
                                                                                class="far fa-times"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>

                                                        <form action="{{ route('delete-ai-document', $ai_history->id) }}" method="POST" id="delete_doc_form_{{ $ai_history->id }}">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>

                                        {{ $ai_histories->links('custom_pagination') }}
                                    </div>
                                    <div class="wsus_dash_ai_history_edit">
                                        <a class="back_edit"><i class="fas fa-long-arrow-alt-left"></i> {{__('user.go back')}}</a>
                                        <h3>{{__('user.Document edit')}}</h3>
                                        <form action="" method="POST" id="update_ai_content_form">
                                            @csrf
                                        <div class="ai_writing_sidebar_input">
                                            <label>{{__('user.Title')}}</label>
                                            <input type="text" name="title" id="ai_title" required>
                                        </div>
                                        <div class="ai_writing_body">
                                            <textarea name="ai_content" class="form-control summernote" id="ai_content_output"></textarea>
                                        </div>


                                        <button class="read_btn" type="submit">
                                            {{__('user.Update Document')}}</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==========================
        DASHBOARD END
    ===========================-->



<script>
    (function($) {
    "use strict";
    $(document).ready(function () {
        $(".edit_history").on("click", function(){
            let ai_history = $(this).data('ai-history');
            let ai_title = $(this).data('ai-title');
            let ai_id = $(this).data('ai-id');
            $("#ai_content_output").summernote('code','')
            $("#ai_title").val(ai_title)

            $.ajax({
                type:"get",
                url:"{{ url('single-ai-document/') }}"+ "/" + ai_id,
                success:function(response){
                    $(".ai_writing_body").html(response)
                },
                error:function(err){
                }
            })

            $("#update_ai_content_form").attr("action",'{{ url("update-ai-history") }}'+"/"+ai_id)
        })
    });

    })(jQuery);

    function nl2br(str, is_xhtml) {
        var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />'   : '<br>';
        return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag   + '$2');
    }
</script>

<script>
    function deleteDocument(id){
        Swal.fire({
            title: "{{__('user.Are you realy want to delete this item ?')}}",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "{{__('user.Yes, Delete It')}}",
            cancelButtonText: "{{__('user.Cancel')}}",
        }).then((result) => {
            if (result.isConfirmed) {
                $("#delete_doc_form_"+id).submit();
            }

        })
    }
</script>
@endsection
