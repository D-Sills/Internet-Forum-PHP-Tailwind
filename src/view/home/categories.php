<!-- views/categories.php -->
<div class="accordion">
    <?php foreach ($categories as $category): ?>
        <div class="accordion-item mb-3">
            <!-- Header -->
            <h3 class="accordion-header" id="heading<?php echo $category['category_id']; ?>">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $category['category_id']; ?>" aria-expanded="false" aria-controls="collapse<?php echo $category['category_id']; ?>">
                    <h3 class ="text-lg" style="color:white;"><?php echo $category['category_name']; ?></h3>
                </button>
            </h3>

            <!-- Body -->
            <div id="collapse<?php echo $category['category_id']; ?>" class="accordion-collapse collapse show" aria-labelledby="heading<?php echo $category['category_id']; ?>">
                <div class="accordion-body p-0">
                    <?php 
                    foreach ($topics as $topic): 
                        if ($topic['category_id'] === $category['category_id']): 
                            echo '<div class="odd-even">';
                            include 'topic.php';
                            echo '</div>';
                        endif;
                    endforeach; 
                    ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

