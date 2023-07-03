<!-- views/pagination.php -->
<?php if ($totalPages >= 1): ?>
    <nav>
        <ul class="pagination">
            <!-- Page Links -->
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?php echo $i === $pageNumber ? 'active' : ''; ?>">
                <a class="page-link" href="<?php echo clean_topic_name_for_url($title); ?>.<?php echo $topicId; ?>?page=<?php echo $i; ?>">
                        <?php echo $i; ?>
                    </a>
                </li>
            <?php endfor; ?>

            <!-- Next Page Link -->
            <?php if ($pageNumber < $totalPages): ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo clean_topic_name_for_url($title); ?>.<?php echo $topicId; ?>?page=<?php echo $pageNumber + 1; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            <?php else: ?>
                <li class="page-item disabled">
                    <span class="page-link" aria-hidden="true">&raquo;</span>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
<?php endif; ?>
