<?php

namespace App\Libraries\Table;

use CodeIgniter\Config\BaseConfig;

class TableBootstrap5 extends BaseConfig
{

    public $table = [
        'view'    => '<table{attributes}{classes}{dataset}>{innerhtml}</table>',
        'classes' => 'table table-hover mt-3',
    ];

    public $thead = [
        'view'        => '<thead{classes}>{innerhtml}</thead>',
        'classes'     => '',
        'row'         => '<tr{classes}><form id="table_form">{innerhtml}</form></tr>',
        'row_classes' => 'table-light',
        'cell'        => '<th{classes}>{innerhtml}{sorthtml}{filterhtml}</th>',
    ];

    public $tbody      = [
        'view'        => '<tbody{classes}>{innerhtml}</tbody>',
        'classes'     => 'table-group-divider',
        'row'         => '<tr{classes}{dataset}>{innerhtml}</tr>',
        'row_classes' => '',
        'cell'        => '<td{classes}>{innerhtml}</td>',
    ];
    
    public $tfoot   = [
        'view'        => '<tfoot{classes}>{innerhtml}</tfoot>',
        'classes'     => 'table-group-divider',
        'row'         => '<tr{classes}{dataset}>{innerhtml}</tr>',
        'row_classes' => 'table-light',
        'cell'        => '<td{classes}>{innerhtml}</td>',
    ];

    public $caption = '<caption>{innerhtml}</caption>';

    public $textfilter = [
        'view' => '
  <span class="" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
    
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel ms-1" viewBox="0 0 16 16">
      <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2h-11z"/>
    </svg>

  </span>

  <div class="dropdown-menu p-2">
    <div class="mb-3">
      <label for="{filterid}" class="form-label">{label}</label>
      <input type="text" class="form-control" id="{filterid}" placeholder="{placeholder}" form="{formid}">
    </div>
    <button type="submit" class="btn btn-sm btn-primary">Filter setzen</button>
    <button type="submit" class="btn btn-sm btn-danger">Filter löschen</button>
  </div>
',
    ];

    public $icon = [
        'notfiltered' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel ms-1" viewBox="0 0 16 16">
  <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2h-11z"/>
</svg>',
        'filtered' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel-fill ms-1" viewBox="0 0 16 16">
  <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z"/>
</svg>',
        'asc' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-down-alt ms-2" viewBox="0 0 16 16">
  <path d="M3.5 3.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 12.293V3.5zm4 .5a.5.5 0 0 1 0-1h1a.5.5 0 0 1 0 1h-1zm0 3a.5.5 0 0 1 0-1h3a.5.5 0 0 1 0 1h-3zm0 3a.5.5 0 0 1 0-1h5a.5.5 0 0 1 0 1h-5zM7 12.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5z"/>
</svg>',
        'desc' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-up ms-1" viewBox="0 0 16 16">
  <path d="M3.5 12.5a.5.5 0 0 1-1 0V3.707L1.354 4.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.498.498 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L3.5 3.707V12.5zm3.5-9a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z"/>
</svg>'
    ];

    public $pager = [
        'view'          => '<ul class="pager pagination justify-content-center">{innerhtml}</ul>',
        'surroundcount' => 2,
        'firstpage'     => '<li class="page-item">
               <a class="page-link" href="{firstpagelink}" aria-label="{firstpagelabel}">
                   <span aria-hidden="true">{firstpagelabel}</span>
               </a>
           </li>',
        'previouspage'  => '<li class="page-item">
               <a class="page-link" href="{previouspagelink}" aria-label="{previouspagelabel">
                   <span aria-hidden="true">{previouspagelabel}</span>
               </a>
           </li>',
        'page'          => '<li{active}><a class="page-link" href="{pagelink}">{pagelabel}</a></li>',
        'nextpage'      => '<li class="page-item">
               <a class="page-link" href="{nextpagelink}" aria-label="{nextpagelabel}">
                   <span aria-hidden="true">{nextpagelabel}</span>
               </a>
           </li>',
        'lastpage'      => '<li class="page-item">
               <a class="page-link" href="{lastpagelink}" aria-label="{lastpagelabel}">
                   <span aria-hidden="true">{lastpagelabel}</span>
               </a>
           </li>',
    ];

    public $intsummary = [
        'view' => '<div class="summary">{innerhtml}</div>',
        'summary' => '<span{classes}>{innerhtml}</span>',
    ];

}