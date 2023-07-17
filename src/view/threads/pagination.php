<!-- views/pagination.php -->
<?php if ($totalPages >= 1): ?>
    <nav>
        <ul class="pagination">
            <!-- First Page Link -->
            <?php if ($pageNumber > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="/<?php echo $base_url; ?>/?route=topics&id=<?php echo $topicId; ?>&page=1" aria-label="First">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">First</span>
                    </a>
                </li>
            <?php else: ?>
                <li class="page-item disabled">
                    <span class="page-link" aria-hidden="true">&laquo;</span>
                </li>
            <?php endif; ?>

            <!-- Page Links -->
            <?php if ($totalPages <= 5) {
                // Display all page links if the total number of pages is 5 or fewer
                for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?php echo $i === (int)$pageNumber ? 'active' : ''; ?>">
                        <a class="page-link" href="/<?php echo $base_url; ?>/?route=topics&id=<?php echo $topicId; ?>&page=<?php echo $i; ?>">
                            <?php echo $i; ?>
                        </a>
                    </li>
                <?php endfor;
                
            } else {
                // Display the current page and nearby page links with "..."
                $startPage = max($pageNumber - 1, 1);
                $endPage = min($pageNumber + 2, $totalPages);

                if ($startPage > 1): ?>
                    <li class="page-item disabled">
                        <span class="page-link">...</span>
                    </li>
                <?php endif;

                for ($i = $startPage; $i <= $endPage; $i++): ?>
                    <li class="page-item <?php echo $i === (int)$pageNumber ? 'active' : ''; ?>">
                        <a class="page-link" href="/<?php echo $base_url; ?>/?route=topics&id=<?php echo $topicId; ?>&page=<?php echo $i; ?>">
                            <?php echo $i; ?>
                        </a>
                    </li>
                <?php endfor;

                if ($endPage < $totalPages): ?>
                    <?php if ($endPage !== $totalPages - 1): ?>
                        <li class="page-item disabled">
                            <span class="page-link">...</span>
                        </li>
                    <?php endif; ?>
                    <li class="page-item">
                        <a class="page-link" href="/<?php echo $base_url; ?>/?route=topics&id=<?php echo $topicId; ?>&page=<?php echo $totalPages; ?>" aria-label="Last">
                            <?php echo $totalPages; ?>
                        </a>
                    </li>
                <?php endif;
            } ?>

            <!-- Next Page Link -->
            <?php if ($pageNumber < $totalPages): ?>
                <li class="page-item">
                    <a class="page-link" href="/<?php echo $base_url; ?>/?route=topics&id=<?php echo $topicId; ?>&page=<?php echo $pageNumber + 1; ?>" aria-label="Next">
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


