// let GEMENI_API_KEY = null;

// const getApiKey = async (callback) => {
//     if (GEMENI_API_KEY) {
//         callback(GEMENI_API_KEY);
//         return 0;
//     }
//     await fetch("/config.json")
//         .then((res) => res.json())
//         .then((res) => {
//             GEMENI_API_KEY = res.gemini_api;
//             console.log("im called");
//             callback(res.gemini_api);
//         })
//         .catch((err) => console.error("error", err));
// };
// toggle search
const search_wrap = document.getElementById("search-wrap");
const search_child = document.getElementById("search-child");
search_child.addEventListener("click", (event) => {
    event.stopPropagation();
});
// const closeSearchWrap = () => {

// }
const closeSearchWrap = () => {
    search_child.classList.remove("trans-top");
    search_wrap.classList.remove("fade-in");
    search_child.classList.add("trans-down");
    search_wrap.classList.add("fade-out");
    setTimeout(() => {
        search_wrap.style.visibility = "hidden";
    }, 250);
};
search_wrap.addEventListener("click", closeSearchWrap);
const showSearch = () => {
    search_child.classList.remove("trans-down");
    search_wrap.classList.remove("fade-out");
    search_child.classList.add("trans-top");
    search_wrap.classList.add("fade-in");
    search_wrap.style.visibility = "visible";
};
addEventListener("DOMContentLoaded", () => {
    const codes = document.querySelectorAll("pre");
    codes.forEach((element) => {
        CodeMirror(
            (elt) => {
                element.parentNode.replaceChild(elt, element);
            },
            {
                value: element.innerText.replace(/^\s+|\s+$/g, ""),
                mode: "text/x-mysql",
                theme: "ayu-mirage",
                // lineNumbers: true,
            }
        );
    });
    // scroll to side bar link
    try {
        const scrollTo = document.getElementById("scroll-to");
        scrollTo.scrollIntoView({ behavior: "smooth" });
    } catch (err) {}

    // add list style at li
    const lists = document.querySelectorAll("#post_body ul li");
    lists.forEach((e) => {
        e.innerHTML = "<span class='point'>👉</span>" + e.innerHTML;
    });
    // search div to focus search input
    try {
        const srch_cont = document.getElementById("search-cont");
        const srch_bar = document.getElementById("search-bar");
        srch_cont.addEventListener("click", (e) => {
            srch_bar.focus();
        });
    } catch (err) {}
    // search mechanism
    try {
        const searchInput = document.getElementById("search-bar");
        const result_container = document.getElementById("search-res");
        const search_loading = document.getElementById("search-loading");
        let search_interval = null;
        searchInput.addEventListener("keyup", async (e) => {
            let res = e.target.value;
            search_loading.classList.remove("hidden");
            result_container.innerHTML = "";
            if (res.length >= 3) {
                if (search_interval) clearTimeout(search_interval);
                search_interval = setTimeout(async () => {
                    await fetch(`/api/search/${res}`)
                        .then((res) => res.json())
                        .then((res) => {
                            search_loading.classList.add("hidden");
                            let anim_delay = 0;
                            if (res.length > 0) {
                                res.map((cat) => {
                                    cat.posts.map((post) => {
                                        result_container.innerHTML += `
                                  <a href="/${cat.slug}/${post.slug}"
                                        class="trans-top fade-in flex justify-between p-4 border-t w-full border-opacity-25 border-white transition-colors text-slate-100"
                                        style="animation-delay: ${anim_delay}ms"
                                        >
                                        
                                        <span class="linku">${post.title}</span>
                                        <span class="text-slate-600">${cat.title}</span>
                                    </a>
                                `;
                                        anim_delay += 100;
                                    });
                                });
                            } else {
                                result_container.innerHTML += `
                                <div  class="flex text-slate-600 p-4 items-center justify-between border-t w-full border-opacity-15 border-white">
                                    Search result not found.
                                </div> 
                                `;
                            }
                        })
                        .catch((err) => console.error(err));
                }, 600);
            }
        });
    } catch (err) {}
});
