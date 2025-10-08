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
      overflow: hidden;
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
      overflow-x: auto;
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
      transition: transform 0.28s, box-shadow 0.28s;
      position: relative;
      overflow: hidden;
    }

    .img-card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      border-radius: 22px 22px 0 0;
      display: block;
      box-shadow: 0 2px 12px #43cea233;
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
      letter-spacing: 0.2px;
      box-shadow: 0 0.5px 2px #43cea233;
    }

    /* Navigation Arrows */
    .nav-arrow {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background: linear-gradient(90deg, #43cea2 0%, #185a9d 100%);
      color: #fff;
      border-radius: 50%;
      width: 48px;
      height: 48px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 2rem;
      box-shadow: 0 2px 8px #185a9d33;
      cursor: pointer;
      border: none;
      outline: none;
      transition: background 0.2s;
      z-index: 5;
    }
    .nav-arrow:hover {
      background: linear-gradient(90deg, #185a9d 0%, #43cea2 100%);
    }
    .nav-left { left: 12px; }
    .nav-right { right: 12px; }

    /* Responsive */
    @media (max-width: 900px) {
      .img-card { flex: 0 0 70vw; min-width: 70vw; max-width: 70vw; }
      .img-scroller { gap: 18px; padding: 10px 6px; }
    }
    @media (max-width: 600px) {
      .img-card { flex: 0 0 90vw; min-width: 90vw; max-width: 90vw; }
      .img-card img { height: 120px; }
      .img-desc { font-size: 1rem; padding: 12px 8px; }
      .nav-arrow { width: 40px; height: 40px; font-size: 1.5rem; }
    }
  </style>
</head>
<body>
  <div class="img-scroller-container">
    <button class="nav-arrow nav-left" onclick="scrollLeft()">&#8592;</button>
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
      <div class="img-card">
        <img src="https://images.unsplash.com/photo-1519985176271-adb1088fa94c?auto=format&fit=crop&w=400&q=80" alt="Bar">
        <div class="img-desc">Bar: Enjoy signature cocktails and drinks.</div>
      </div>
    </div>
    <button class="nav-arrow nav-right" onclick="scrollRight()">&#8594;</button>
  </div>

  <script>
    const scroller = document.getElementById("imgScroller");
    let scrollAmount = 0;
    const step = 80; // pixel scroll step
    const delay = 800; // auto scroll delay in ms

    function scrollLeft() {
      scroller.scrollBy({ left: -step, behavior: 'smooth' });
    }

    function scrollRight() {
      scroller.scrollBy({ left: step, behavior: 'smooth' });
    }

    // Auto-scroll loop
    setInterval(() => {
      if (scroller.scrollLeft + scroller.clientWidth >= scroller.scrollWidth) {
        scroller.scrollTo({ left: 0, behavior: 'smooth' });
      } else {
        scroller.scrollBy({ left: step, behavior: 'smooth' });
      }
    }, delay);
  </script>
</body>
</html>
<?php include "../frontend/the four imgs.php" ?>






