<?php

// src/YS/BlogBundle/Entity/BlogPost.php

namespace YS\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlogPost
 *
 * @ORM\Table(name="blog_post")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="YS\BlogBundle\Repository\BlogPostRepository")
 */
class BlogPost
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text")
     */
    private $body;

    /**
     * @var bool
     *
     * @ORM\Column(name="draft", type="boolean")
     */
    private $draft = false;

    /**
     * @var bool
     *
     * @ORM\Column(name="enabled", type="boolean")
     */
    private $enabled = true;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="blogPosts")
     */
    private $category;

    /**
     * @var \DateTime $createdAt
     *
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;

    /**
     * @var \DateTime $updatedAt
     *
     * @ORM\Column(type="datetime")
     */
    protected $updatedAt;

    /**
     *
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updatedTimestamps()
    {
      $this->updatedAt = new \DateTime();

      if ($this->createdAt == null) {
        $this->createdAt = new \DateTime();
      }
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return BlogPost
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set body
     *
     * @param string $body
     *
     * @return BlogPost
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set draft
     *
     * @param boolean $draft
     *
     * @return BlogPost
     */
    public function setDraft($draft)
    {
        $this->draft = $draft;

        return $this;
    }

    /**
     * Get draft
     *
     * @return bool
     */
    public function getDraft()
    {
        return $this->draft;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     *
     * @return BlogPost
     */
    public function setEnabled($enabled)
    {
      $this->enabled = $enabled;

      return $this;
    }

    /**
     * Get enabled
     *
     * @return bool
     */
    public function getEnabled()
    {
      return $this->enabled;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
      return $this->createdAt;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
      return $this->updatedAt;
    }

    public function setCategory(Category $category)
    {
      $this->category = $category;
    }

    public function getCategory()
    {
      return $this->category;
    }

  /**
   * @return string
   */
  public function __toString()
  {
    return (string)$this->getTitle();
  }
}

