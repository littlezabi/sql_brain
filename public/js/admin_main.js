let setInterval = undefined;
addEventListener("DOMContentLoaded", () => {
    const category_title = document.getElementById("category_title");
    const slug = document.getElementById("slug");
    const slug_msg = document.getElementById("slug_msg");
    let hidden_slug = undefined;
    try {
        hidden_slug = document.getElementById("hidden_slug").value;
    } catch (err) {
        console.log(err);
    }
    const slug_listener = (e) => {
        if (setInterval) clearInterval(setInterval);
        setInterval = setTimeout(() => {
            checkSlug(e.target.value);
        }, 800);
    };
    category_title.addEventListener("keyup", slug_listener);
    slug.addEventListener("keyup", slug_listener);
    const checkSlug = async (text) => {
        slug_msg.classList.add("hidden");

        await fetch(`/api/slug/${text}`)
            .then((res) => res.json())
            .then((res) => {
                slug.value = res.slug;

                console.log(hidden_slug, res.slug);
                if (res.exist) {
                    if (hidden_slug != undefined && hidden_slug == res.slug) {
                        return 0;
                    }
                    slug_msg.innerHTML = "Slug is already exist!";
                    slug_msg.classList.add("border-red-400");
                    slug_msg.classList.remove("hidden");
                } else {
                    slug_msg.innerHTML = "Slug is already exist!";
                    slug_msg.classList.add("hidden");
                }
            })
            .catch((error) => console.error(error));
    };
});
