<?php

namespace Pastheme\Blog\Model;

use Pagekit\Database\ORM\ModelTrait;

/**
* @Entity(tableClass="@dpnblog_category")
*/
class Category
{
  use CategoryModelTrait;

  /* Post draft status. */
  const STATUS_DRAFT = 0;
  /* Post pending review status. */
  const STATUS_PENDING_REVIEW = 1;
  /* Post published. */
  const STATUS_PUBLISHED = 2;
  /* Post unpublished. */
  const STATUS_UNPUBLISHED = 3;

  /** @Column(type="integer") , @Id */
  public $id;

  /** @Column(type="string") */
  public $title;

  /** @Column(type="string") */
  public $slug;

  /** @Column(type="string") */
  public $status;

  /** @Column(type="datetime") */
  public $date;

  /** @Column(type="json_array") */
  public $data;

  /** @Column(type="simple_array") **/
  public $sub_category;

  /** @var array */
  protected static $properties = [
      'author' => 'getAuthor',
      'published' => 'isPublished',
      'accessible' => 'isAccessible'
  ];

  public static function getStatuses()
  {
      return [
          self::STATUS_PUBLISHED => __('Published'),
          self::STATUS_UNPUBLISHED => __('Unpublished'),
          self::STATUS_DRAFT => __('Draft'),
          self::STATUS_PENDING_REVIEW => __('Pending Review')
      ];
  }

  public function getStatusText()
  {
      $statuses = self::getStatuses();
      return isset($statuses[$this->status]) ? $statuses[$this->status] : __('Unknown');
  }

}

?>
