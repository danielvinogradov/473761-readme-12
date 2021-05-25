<p><?= htmlspecialchars(cut_string($body)) ?></p>
<?php if (htmlspecialchars(cut_string($body)) !== htmlspecialchars($body)): ?>
    <div class="post-text__more-link-wrapper">
        <a class="post-text__more-link" href="#">Читать далее</a>
    </div>
<?php endif; ?>
