window.onload = function () {
    list = document.querySelectorAll(".like-post");
    for (let i = 0; i < list.length; i++) {
        list[i].addEventListener("click", function (e) {
            e.preventDefault();
            _this = this.getElementsByClassName('fa-stack-1x')[0];
            NumberOfLikes = parseInt(_this.innerText);

            /* DUO TO NO DATABASE. CHANGE TARGET SO IF CLICKED AGAIN, MINUS ON THE LIKES */

            (parseInt(_this.getAttribute("likes")) === NumberOfLikes ? NumberOfLikes++ : NumberOfLikes--)

            /* UPDATE TEXT */
            _this.innerHTML = NumberOfLikes;
        });
    }

    readMore = document.querySelectorAll(".card-body p");
    for(let i = 0; i < readMore.length; i++){

        /* CHANGE HEIGHT ON CARD-CONTENT IF OFFSET HEIGHT IS LARGER THAN 190 */
        let _test = readMore[i].parentNode.getElementsByClassName('card-content')[0];
        if(_test.offsetHeight < '190'){
            readMore[i].innerText = ''; 
        }else{
            _test.style.height = '190px';
            _test.style.overflow = 'hidden';
        }

        // style="height: 190px; overflow:hidden;"
        readMore[i].addEventListener("click", function (e){
            e.preventDefault();
            let text = this;
            _this = this.parentNode.getElementsByClassName('card-content')[0];
            if(_this.style.height === '190px'){
                text.innerText = 'Läs mindre';
                _this.style.height = 'auto';
            }else{
                text.innerText = 'Läs hela nyheten';
                _this.style.height = '190px';
            }
        });
    }
    
};

