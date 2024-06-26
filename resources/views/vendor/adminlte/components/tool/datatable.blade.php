{{-- Table --}}

<div class="table-responsive dataTable-admin">

<table id="{{ $id }}" style="width:100%" {{ $attributes->merge(['class' => $makeTableClass()]) }}>

    {{-- Table head --}}
    <thead class="thead-admin">
        <tr>
            @foreach($heads as $th)
                <th @isset($th['classes']) class="{{ $th['classes'] }}" @endisset
                    @isset($th['width']) style="width:{{ $th['width'] }}%" @endisset
                    @isset($th['no-export']) dt-no-export @endisset>
                    {{ is_array($th) ? ($th['label'] ?? '') : $th }}
                </th>
            @endforeach
        </tr>
    </thead>

    {{-- Table body --}}
    <tbody>{{ $slot }}</tbody>

    {{-- Table footer --}}
    @isset($withFooter)
        <tfoot @isset($footerTheme) class="thead-{{ $footerTheme }}" @endisset>
            <tr>
                @foreach($heads as $th)
                    <th>{{ is_array($th) ? ($th['label'] ?? '') : $th }}</th>
                @endforeach
            </tr>
        </tfoot>
    @endisset

</table>

</div>

{{-- Add plugin initialization and configuration code --}}
@php
$config['language'] = [
    'lengthMenu' => 'Ցուցադրել _MENU_ գրառում էջում',
    'zeroRecords' => 'Գրառումներ չեն գտնվել',
    'info' => 'Ցուցադրվում է _PAGE_ էջ _PAGES_ էջից',
    'infoEmpty' => 'Գրառումներ չեն գտնվել',
    'infoFiltered' => '(Ֆիլտրվել է _MAX_ ընդհանուր գրառումից)',
    'search' => 'Որոնում',
    'paginate' => [
        'first' => 'Առաջին',
        'last' => 'Վերջին',
        'next' => 'Հաջորդ',
        'previous' => 'Նախորդ',
    ]
];
$config['processing'] = true;
$config['serverSide'] = true;
@endphp
@push('js')
<script>

    $(() => {
        $('#{{ $id }}').DataTable( @json($config) );

        $('#orders-data-table').on( 'draw.dt', function () {
            $(this).find('tr').each(function() {
                let dataId = $(this).find('span').data('id');
                $(this).addClass('order-status order-status-'+dataId);
            });
        });
    })

</script>
@endpush

{{-- Add CSS styling --}}

@isset($beautify)
    @push('css')
    <style type="text/css">
        #{{ $id }} tr td,  #{{ $id }} tr th {
            vertical-align: middle;
            text-align: center;
        }
    </style>
    @endpush
@endisset
