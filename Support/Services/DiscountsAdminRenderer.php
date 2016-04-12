<?php namespace Modules\StorageCalculator\Support\Services;

use Illuminate\Support\Facades\URL;

class DiscountsAdminRenderer
{
    /**
     * @var int Id of the discount to render
     */
    protected $storageId;
    /**
     * @var string
     */
    private $startTag = '<div class="dd">';
    /**
     * @var string
     */
    private $endTag = '</div>';
    /**
     * @var string
     */
    private $discount = '';

    /**
     * @param $storageId
     * @param $discountItems
     * @return string
     */
    public function renderForAdmin($storageId, $discountItems)
    {
        $this->storageId = $storageId;

        $this->discount .= $this->startTag;
        $this->generateHtmlFor($discountItems);
        $this->discount .= $this->endTag;

        return $this->discount;
    }

    /**
     * Generate the html for the given items
     * @param $items
     */
    private function generateHtmlFor($items)
    {
        $this->discount .= '<ol class="dd-list">';
        foreach ($items as $item) {
            $this->discount .= "<li class=\"dd-item\" data-id=\"{$item->id}\">";
            $editLink = URL::route('dashboard.discountitem.edit', [$this->storageId, $item->id]);
            $style = $item->isRoot() ? 'none' : 'inline';
            $this->discount .= <<<HTML
<div class="btn-group" role="group" aria-label="Action buttons" style="display: {$style}">
    <a class="btn btn-sm btn-info" style="float:left;" href="{$editLink}">
        <i class="fa fa-pencil"></i>
    </a>
    <a class="btn btn-sm btn-danger jsDeletediscountItem" style="float:left; margin-right: 15px;" data-item-id="{$item->id}">
       <i class="fa fa-times"></i>
    </a>
</div>
HTML;
            $handleClass = $item->isRoot() ? 'dd-handle-root' : 'dd-handle';
            if (isset($item->icon) && $item->icon != '') {
                $this->discount .= "<div class=\"{$handleClass}\"><i class=\"{$item->icon}\" ></i> {$item->title}</div>";
            } else {
                $this->discount .= "<div class=\"{$handleClass}\">{$item->title}</div>";
            }

            if ($this->hasChildren($item)) {
                $this->generateHtmlFor($item->items);
            }

            $this->discount .= '</li>';
        }
        $this->discount .= '</ol>';
    }
}
