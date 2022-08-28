const loadMoreBtn = document.querySelector('.load-more__btn');
const loadMoreText = document.querySelector('.load-more__text');
const loadMoreCube = document.querySelector('.load-more__cube');
// Import Product
var ProductList = {
    simpleLoadMore() {
        // All Style
        $('.all-row').simpleLoadMore({
            item: '.load-more',
            count: 12,
            itemsToLoad: 8,
            easing: 'fade',
            btnHTML: `
            <button class="btn button-default d-flex justify-between load-more__btn text-center">
                <span class="load-more__text defaultAnimation">Xem thêm</span>
                <div class="load-more__spinner spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </button>
            `,
            onNextLoad: ($items, $btn) => {
                $btn[0].children[0].classList.add('d-none');
                $btn[0].children[1].classList.add('d-block');
                setInterval(() => {
                    $btn[0].children[0].classList.remove('d-none');
                    $btn[0].children[1].classList.remove('d-block');
                }, 1000);
            },
            onComplete: ($items, $btn) => {
                $btn[0].children[0].classList.add('d-none');
                $btn[0].children[1].classList.add('d-block');
                setInterval(() => {
                    $btn[0].children[0].classList.remove('d-none');
                    $btn[0].children[1].classList.remove('d-block');
                }, 1000);
            }
        });
    },
    start() {
        this.simpleLoadMore();
    }
}

ProductList.start();
