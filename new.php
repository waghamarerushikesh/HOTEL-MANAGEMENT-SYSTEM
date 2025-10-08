<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Next Level Image Scroller</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      background: linear-gradient(120deg, #e0eafc 0%, #cfdef3 100%);
      font-family: 'Segoe UI', Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    .img-scroller-container {
      width: 100%;
      overflow-x: auto;
      padding: 48px 0 36px 0;
      background: transparent;
      position: relative;
    }
    .img-scroller {
      display: flex;
      gap: 36px;
      min-width: 900px;
      padding: 10px 32px;
      scroll-behavior: smooth;
      scrollbar-width: thin;
      scrollbar-color: #43cea2 #e0eafc;
    }
    .img-scroller::-webkit-scrollbar {
      height: 10px;
      background: #e0eafc;
    }
    .img-scroller::-webkit-scrollbar-thumb {
      background: linear-gradient(90deg, #43cea2 0%, #185a9d 100%);
      border-radius: 8px;
    }
    .img-card {
      flex: 0 0 270px;
      background: rgba(255,255,255,0.98);
      border-radius: 22px;
      box-shadow: 0 8px 32px rgba(24,90,157,0.13), 0 2px 8px #43cea2a0;
      display: flex;
      flex-direction: column;
      align-items: center;
      min-width: 270px;
      max-width: 270px;
      transition: transform 0.28s cubic-bezier(.23,1.01,.32,1), box-shadow 0.28s;
      position: relative;
      overflow: hidden;
      border: 2.5px solid transparent;
      background-clip: padding-box;
    }
    .img-card::before {
      content: "";
      position: absolute;
      top: 0; left: 0; width: 100%; height: 100%;
      background: linear-gradient(120deg, rgba(67,206,162,0.10) 0%, rgba(24,90,157,0.10) 100%);
      z-index: 1;
      pointer-events: none;
    }
    .img-card:hover {
      transform: translateY(-12px) scale(1.045) rotate(-1.5deg);
      box-shadow: 0 16px 48px #43cea2a0, 0 4px 16px #185a9d33;
      border: 2.5px solid #43cea2;
      animation: borderGlow 1.2s infinite alternate;
    }
    @keyframes borderGlow {
      from { box-shadow: 0 0 0 4px #43cea2, 0 16px 48px #43cea2a0, 0 4px 16px #185a9d33; }
      to   { box-shadow: 0 0 0 10px #43cea299, 0 16px 48px #43cea2a0, 0 4px 16px #185a9d33; }
    }
    .img-card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      border-radius: 22px 22px 0 0;
      display: block;
      transition: filter 0.3s;
      z-index: 2;
      position: relative;
      box-shadow: 0 2px 12px #43cea233;
    }
    .img-card:hover img {
      filter: brightness(0.93) blur(1.5px);
    }
    .img-desc {
      padding: 20px 16px 18px 16px;
      font-size: 1.13rem;
      color: #185a9d;
      text-align: center;
      min-height: 70px;
      background: rgba(248,252,255,0.97);
      border-radius: 0 0 22px 22px;
      font-weight: 500;
      z-index: 2;
      position: relative;
      transition: background 0.3s, color 0.3s;
      letter-spacing: 0.2px;
      box-shadow: 0 0.5px 2px #43cea233;
    }
    .img-card:hover .img-desc {
      background: linear-gradient(90deg, #43cea2 0%, #185a9d 100%);
      color: #fff;
      letter-spacing: 1px;
    }
    /* Scroller arrow on last image */
    .img-card.last-img {
      box-shadow: 0 4px 18px #43cea2a0, 0 0 0 4px #43cea2 inset;
      border: 2.5px solid #43cea2;
    }
    .scroller-arrow {
      position: absolute;
      right: 18px;
      bottom: 28px;
      background: linear-gradient(90deg, #43cea2 0%, #185a9d 100%);
      color: #fff;
      border-radius: 50%;
      width: 44px;
      height: 44px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 2rem;
      box-shadow: 0 2px 8px #185a9d33;
      animation: bounceArrow 1.2s infinite alternate;
      z-index: 3;
      cursor: pointer;
      border: none;
      outline: none;
      transition: background 0.2s;
    }
    .scroller-arrow:hover {
      background: linear-gradient(90deg, #185a9d 0%, #43cea2 100%);
    }
    @keyframes bounceArrow {
      from { transform: translateY(0);}
      to   { transform: translateY(-10px);}
    }
    /* Responsive */
    @media (max-width: 900px) {
      .img-card { flex: 0 0 70vw; min-width: 70vw; max-width: 70vw; }
      .img-scroller { gap: 18px; padding: 10px 6px; }
    }
    @media (max-width: 600px) {
      .img-card { flex: 0 0 90vw; min-width: 90vw; max-width: 90vw; }
      .img-card img { height: 120px; }
      .img-desc { font-size: 1rem; padding: 12px 8px 12px 8px; }
      .scroller-arrow { width: 38px; height: 38px; font-size: 1.4rem; right: 10px; bottom: 14px;}
    }
  </style>
</head>
<body>
  <div class="img-scroller-container">
    <div class="img-scroller" id="imgScroller">
      <div class="img-card">
        <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=400&q=80" alt="Luxury Room">
        <div class="img-desc">Luxury Room: Spacious comfort with scenic views.</div>
      </div>
      <div class="img-card">
        <img src="https://images.unsplash.com/photo-1464983953574-0892a716854b?auto=format&fit=crop&w=400&q=80" alt="Infinity Pool">
        <div class="img-desc">Infinity Pool: Relax and unwind by the poolside.</div>
      </div>
      <div class="img-card">
        <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=400&q=80" alt="Fine Dining">
        <div class="img-desc">Fine Dining: Gourmet meals by top chefs.</div>
      </div>
      <div class="img-card">
        <img src="https://images.unsplash.com/photo-1512918728675-ed5a9ecdebfd?auto=format&fit=crop&w=400&q=80" alt="Lobby">
        <div class="img-desc">Grand Lobby: Elegant welcome area for guests.</div>
      </div>
      <div class="img-card">
        <img src="https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?auto=format&fit=crop&w=400&q=80" alt="Spa">
        <div class="img-desc">Spa: Rejuvenate with our luxury spa treatments.</div>
      </div>
      <div class="img-card">
        <img src="https://images.unsplash.com/photo-1465101046530-73398c7f28ca?auto=format&fit=crop&w=400&q=80" alt="Conference Hall">
        <div class="img-desc">Conference Hall: Perfect for business meetings.</div>
      </div>
      <div class="img-card">
        <img src="https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=400&q=80" alt="Garden">
        <div class="img-desc">Garden: Lush green spaces for relaxation.</div>
      </div>
      <div class="img-card">
        <img src="https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=400&q=80" alt="Gym">
        <div class="img-desc">Gym: State-of-the-art fitness center.</div>
      </div>
      <div class="img-card">
        <img src="https://images.unsplash.com/photo-1468421870903-4df1664ac249?auto=format&fit=crop&w=400&q=80" alt="Kids Play Area">
        <div class="img-desc">Kids Play Area: Fun and safe for children.</div>
      </div>
      <div class="img-card last-img">
        <img src="https://images.unsplash.com/photo-1519985176271-adb1088fa94c?auto=format&fit=crop&w=400&q=80" alt="Bar">
        <div class="img-desc">Bar: Enjoy signature cocktails and drinks.</div>
        <button class="scroller-arrow" onclick="document.getElementById('imgScroller').scrollTo({left:0,behavior:'smooth'});" title="Back to Start">&#8592;</button>
      </div>
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        const scroller = document.getElementById('imgScroller');
        const cards = scroller.querySelectorAll('.img-card');
        let currentIndex = 0;

        function slideToNextCard() {
            // Calculate the scroll position for the next card
            currentIndex = (currentIndex + 1) % cards.length;
            const newScrollPosition = cards[currentIndex].offsetLeft - 32; // Offset by the left padding

            // If it's the last card, scroll smoothly back to the start.
            // The "- 32" in the newScrollPosition also handles the gap.
            scroller.scrollTo({
                left: newScrollPosition,
                behavior: 'smooth'
            });
        }

        let intervalId = null;

        function startSliding() {
            // Start the sliding interval every 1 second
            intervalId = setInterval(slideToNextCard, 1000); // 1000 milliseconds = 1 second
        }

        // Initial 1-second delay before the sliding begins
        setTimeout(startSliding, 1000);

        // Stop sliding on hover
        scroller.addEventListener('mouseenter', () => {
            clearInterval(intervalId);
        });

        // Resume sliding when mouse leaves
        scroller.addEventListener('mouseleave', () => {
            startSliding();
        });
    });
  </script>
</body>
</html>