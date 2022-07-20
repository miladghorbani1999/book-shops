@extends('dashboard',[
    'title'=>'ویرایش اطلاعات کتاب'
])
@section('content')
    <div class="add-book">
        <form action="{{route('books.update',$book)}}" class="row col-11 mx-auto pb-3" method="POST">
            @csrf
            <input type="hidden" name="_method" value="put" />
            <div class="form-group col-6 ">
                <label for="first-name">نام</label>
                <input type="text" name="name" class="form-control" id="first-name"
                       value="{{$book->name}}" >
            </div>
            <div class="form-group col-6 ">
                <label for="price">قیمت</label>
                <input type="number" name="price" class="form-control" id="price"
                       value="{{$book->price}}"/>
            </div>
            <div class="form-group col-6 pt-3">
                <label for="count">تعداد</label>
                <input type="number" name="inventory" class="form-control" id="count"
                       value="{{$book->inventory}}"/>
            </div>
            <div class="form-group col-6 pt-3">
                <label for="category">دسته‌بندی</label>
                <select id="category" name="category" class="form-control" >
                    @foreach($categories as $category)
                        @if($category->id==$book->category->id)
                            <option selected value="{{$category['id']}}">{{$category['name']}}</option>
                        @endif
                        <option value="{{$category['id']}}">{{$category['name']}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-6 pt-3">
                <label for="writer">نویسنده</label>
                <select id="writer" name="writer_id" class="form-control">

                    @foreach($writers as $writer)
                        @if($writer->id==$book->writer->id)
                            <option selected value="{{$writer['id']}}">{{$writer['full_name']}}</option>
                        @endif
                        <option value="{{$writer['id']}}">{{$writer['full_name']}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-6 pt-3">
                <label for="publication">زمان انتشار</label>
                <input type="text" name="publication_year" class="form-control publication-time" id="publication"
                       value="{{$book->publication_year}}" {{old('publication_year')}}/>
            </div>
            <div class="form-group col-12 pt-3">
                <label for="description">توضیحات</label>
                <textarea type="text" name="description" class="form-control text-right" id="editor"
                >{{$book->description}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-5 ">ثبت</button>
            <div class="col-12 mt-2">
                @if($errors->any())

                    <div class="alert alert-danger col-12">

                        @foreach($errors->all() as $key => $error)
                            {{ $error }}<br/>
                        @endforeach
                    </div>
                @endif
                @if (Session::has('success'))
                    <div class="alert alert-success mb-0">
                        <ul>
                            <li>{!! Session::get('success') !!}</li>
                        </ul>
                    </div>
                @endif
            </div>
        </form>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/super-build/ckeditor.js"></script>

    <script type="text/javascript">
        CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
            toolbar: {
                items: [
                    'findAndReplace', 'selectAll', '|',
                    'heading', '|',
                    'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                    'bulletedList', 'numberedList', 'todoList', '|',
                    'outdent', 'indent', '|',
                    'undo', 'redo',
                    '-',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                    'alignment', '|',
                    'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', '|',
                    'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                    'textPartLanguage', '|',
                    'sourceEditing'
                ],
                shouldNotGroupWhenFull: true
            },
            // Changing the language of the interface requires loading the language file using the <script> tag.
            // language: 'es',
            list: {
                properties: {
                    styles: true,
                    startIndex: true,
                    reversed: true
                }
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                    { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                    { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                    { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                ]
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
            placeholder: 'توضیحات وارد کنید',
            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
            fontFamily: {
                options: [
                    'default',
                    'Arial, Helvetica, sans-serif',
                ],
                supportAllValues: true
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
            fontSize: {
                options: [ 10, 12, 14, 'default', 18, 20, 22 ],
                supportAllValues: true
            },
            // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
            // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
            // htmlSupport: {
            //     allow: [
            //         {
            //             name: /.*/,
            //             attributes: true,
            //             classes: true,
            //             styles: true
            //         }
            //     ]
            // },
            // Be careful with enabling previews
            // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
            // htmlEmbed: {
            //     showPreviews: true
            // },
            // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
            link: {
                decorators: {
                    addTargetToExternalLinks: true,
                    defaultProtocol: 'https://',
                    toggleDownloadable: {
                        mode: 'manual',
                        label: 'Downloadable',
                        attributes: {
                            download: 'file'
                        }
                    }
                }
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
            mention: {
                feeds: [
                    {
                        marker: '@',
                        feed: [
                            '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                            '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                            '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                            '@sugar', '@sweet', '@topping', '@wafer'
                        ],
                        minimumCharacters: 1
                    }
                ]
            },
            // The "super-build" contains more premium features that require additional configuration, disable them below.
            // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
            removePlugins: [
                // These two are commercial, but you can try them out without registering to a trial.
                // 'ExportPdf',
                // 'ExportWord',
                'CKBox',
                'CKFinder',
                'EasyImage',
                // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                // Storing images as Base64 is usually a very bad idea.
                // Replace it on production website with other solutions:
                // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                // 'Base64UploadAdapter',
                'RealTimeCollaborativeComments',
                'RealTimeCollaborativeTrackChanges',
                'RealTimeCollaborativeRevisionHistory',
                'PresenceList',
                'Comments',
                'TrackChanges',
                'TrackChangesData',
                'RevisionHistory',
                'Pagination',
                'WProofreader',
                // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                // from a local file system (file://) - load this site via HTTP server if you enable MathType
                'MathType'
            ]
        });

        $(document).ready(function () {
            $("#publication").persianDatepicker({
                months: ["فروردین", "اردیبهشت", "خرداد", "تیر", "مرداد", "شهریور", "مهر", "آبان", "آذر", "دی", "بهمن", "اسفند"],
                dowTitle: ["شنبه", "یکشنبه", "دوشنبه", "سه شنبه", "چهارشنبه", "پنج شنبه", "جمعه"],
                shortDowTitle: ["ش", "ی", "د", "س", "چ", "پ", "ج"],
                showGregorianDate: !1,
                persianNumbers: !0,
                formatDate: "YYYY/MM/DD",
                selectedBefore: !1,
                selectedDate: null,
                startDate: null,
                endDate: null,
                prevArrow: '\u25c4',
                nextArrow: '\u25ba',
                theme: 'default',
                alwaysShow: !1,
                selectableYears: null,
                selectableMonths: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                cellWidth: 25, // by px
                cellHeight: 20, // by px
                fontSize: 13, // by px
                isRTL: !1,
                calendarPosition: {
                    x: 0,
                    y: 0,
                },
                onShow: function () {
                },
                onHide: function () {
                },
                onSelect: function () {
                },
                onRender: function () {
                }
            });
        });

    </script>

@endsection
