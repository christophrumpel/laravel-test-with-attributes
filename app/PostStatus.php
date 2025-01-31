<?php

namespace App;

enum PostStatus: string
{
    case Published = 'published';
    case Draft = 'draft';
    case Archived = 'archived';
}
