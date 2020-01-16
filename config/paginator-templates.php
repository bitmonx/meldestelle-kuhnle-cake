<?php
/**
 * Created by PhpStorm.
 * User: roses
 * Date: 12.01.2019
 * Time: 18:24
 */

return [
    'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
    'nextActive' => '
        <li class="page-item active">
            <a class="page-link" href="{{url}}" aria-label="Next">
                <span aria-hidden="true"><i class="fas fa-arrow-right"></i></span>
            </a>
        </li>',
    'nextDisabled' => '
        <li class="page-item disabled">
            <a class="page-link" href="{{url}}" aria-label="Next">
                <span aria-hidden="true"><i class="fas fa-arrow-right"></i></span>
            </a>
        </li>',
    'prevActive' => '
        <li class="page-item active">
            <a class="page-link" href="{{url}}" aria-label="Previous">
                <span aria-hidden="true"><i class="fas fa-arrow-left"></i></span>
            </a>
        </li>',
    'prevDisabled' => '
        <li class="page-item disabled">
            <a class="page-link" href="{{url}}" aria-label="Previous">
                <span aria-hidden="true"><i class="fas fa-arrow-left"></i></span>
            </a>
        </li>',
    'first' => '
        <li class="page-item">
            <a class="page-link" href="{{url}}" aria-label="Next">
                <span aria-hidden="true">Start</span>
            </a>
        </li>
    ',
    'last' => '
        <li class="page-item">
            <a class="page-link" href="{{url}}" aria-label="Next">
                <span aria-hidden="true">Ende</span>
            </a>
        </li>
    ',
    'current' => '<li class="page-item active""><a class="page-link" href="{{url}}">{{text}}</a></li>'
];
