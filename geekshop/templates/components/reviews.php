<div class="wrapper reviews-wrap">
  <h3 class="title-extra">Отзывы</h3>
  <div class="container reviews">

    <?php if ($reviews[0]) : ?>

    <ul class="reviews-list">

      <?php foreach ($reviews as $review): ?>

      <li class="review">
        <figure class="feedback-comment">
          <div class="feedback-comment-right">
            <p class="feedback-comment-text"><?= $review['text'] ?></p>
            <p class="feedback-comment-name"><?= $review['name'] ?></p>
            <p class="feedback-comment-city"><?= $review['date'] ?></p>
          </div>
        </figure>
      </li>

      <?php endforeach ?>

    </ul>

    <?php else : ?>
    <p>Нет ни одного отзыва. Оставь первый!</p>
    <?php endif ?>
    
    <button class="review-add button" @click="isAddReviewOpen = !isAddReviewOpen">Написать отзыв</button>

    <div class="modal modal-review" v-if="isAddReviewOpen">
      <div class="modal__window">
        <h2 class="modal__title">Добавить отзыв</h2>
        <form action="public/add_review.php" method="POST" class="add-review modal-form">
          <label for="review-text" class="modal-form__label">Ваш отзыв</label>
          <textarea v-model="text" id="review-text" name="text" type="text"
            class="modal-form__input modal-form__textarea" required></textarea>
          <label for="review-name" class="modal-form__label">Имя</label>
          <input v-model="name" id="review-name" name="name" type="text" class="modal-form__input" required>
          <input type="submit" value="Отправить" class="modal-form__submit">
        </form>
        <i class="fas fa-times modal__close" @click="isAddReviewOpen = !isAddReviewOpen"></i>
      </div>
    </div>

  </div>
</div>