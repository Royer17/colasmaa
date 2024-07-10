function toggleMenu() {
  const menu = document.getElementById("mobile-menu");
  const icon = document.getElementById("menu-icon");

  menu.classList.toggle("hidden");

  if (menu.classList.contains("hidden")) {
    icon.innerHTML = `
      <path
        fill-rule="evenodd"
        d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"
      />
    `;
  } else {
    icon.innerHTML = `
      <path
        stroke="currentColor"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round"
        d="M6 18L18 6M6 6l12 12"
      />
    `;
  }
}

$(".popup-gallery").magnificPopup({
  delegate: "a",
  type: "image",
  tLoading: "Loading image #%curr%...",
  mainClass: "mfp-img-mobile",
  gallery: {
    enabled: true,
    navigateByImgClick: true,
    preload: [0, 1], // Will preload 0 - before current, and 1 after the current image
  },
  image: {
    tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
  },
  callbacks: {
    open: function () {
      $("body").addClass("mfp-active");
    },
    close: function () {
      $("body").removeClass("mfp-active");
    },
  },
});

setTimeout(() => {
  $(".popup-gallery").magnificPopup("open");
}, 3000);
