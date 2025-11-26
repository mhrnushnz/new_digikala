<div class="ad-skeleton">
    <style>
        .ad-skeleton {
            --light: #f1f3f5;
            --mid: #e4e8ec;
            --dark: #d6dbe0;
            --red: #e63946;

            display: flex;
            justify-content: center;
            padding: 30px 0;
            background: #fff;
            font-family: sans-serif;
        }

        .ad-skeleton__container {
            display: flex;
            justify-content: space-between;
            align-items: stretch;
            width: 95%;
            max-width: 1400px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        /* Red side (right) */
        .ad-skeleton__right {
            width: 220px;
            background: var(--red);
            color: white;
            padding: 30px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .ad-skeleton__title,
        .ad-skeleton__timer div,
        .ad-skeleton__icon,
        .ad-skeleton__link {
            background: linear-gradient(90deg, var(--light) 25%, var(--mid) 50%, var(--light) 75%);
            background-size: 200% 100%;
            animation: ad-skeleton-shimmer 1.5s linear infinite;
            border-radius: 8px;
        }

        .ad-skeleton__title {
            width: 80%;
            height: 20px;
        }

        .ad-skeleton__timer {
            display: flex;
            gap: 6px;
            justify-content: center;
        }

        .ad-skeleton__timer div {
            width: 30px;
            height: 30px;
            border-radius: 6px;
        }

        .ad-skeleton__icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .ad-skeleton__link {
            width: 60%;
            height: 14px;
            border-radius: 6px;
        }

        /* Product carousel */
        .ad-skeleton__carousel {
            flex: 1;
            background: #fff;
            padding: 20px 16px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .ad-skeleton__arrow {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(90deg, var(--light) 25%, var(--mid) 50%, var(--light) 75%);
            background-size: 200% 100%;
            animation: ad-skeleton-shimmer 1.5s linear infinite;
            flex-shrink: 0;
        }

        .ad-skeleton__items {
            flex: 1;
            display: flex;
            gap: 12px;
            overflow: hidden;
        }

        .ad-skeleton__item {
            flex: 1;
            min-width: 160px;
            height: 220px;
            border-radius: 14px;
            background: linear-gradient(90deg, var(--light) 25%, var(--mid) 50%, var(--light) 75%);
            background-size: 200% 100%;
            animation: ad-skeleton-shimmer 1.5s linear infinite;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        }

        /* Shimmer animation */
        @keyframes ad-skeleton-shimmer {
            0% {
                background-position: 200% 0;
            }
            100% {
                background-position: -200% 0;
            }
        }

        /* Responsive */
        @media (max-width: 900px) {
            .ad-skeleton__container {
                flex-direction: column-reverse;
                border-radius: 12px;
            }

            .ad-skeleton__right {
                width: 100%;
                flex-direction: row;
                justify-content: space-around;
                padding: 20px 10px;
            }

            .ad-skeleton__carousel {
                flex-direction: column;
            }

            .ad-skeleton__items {
                justify-content: center;
                flex-wrap: wrap;
            }

            .ad-skeleton__item {
                flex: 1 0 45%;
            }

            .ad-skeleton__arrow {
                display: none;
            }
        }

    </style>
    <div class="ad-skeleton__container">
        <!-- Right red section -->
        <div class="ad-skeleton__right">
            <div class="ad-skeleton__title"></div>
            <div class="ad-skeleton__timer">
                <div></div><div></div><div></div>
            </div>
            <div class="ad-skeleton__icon"></div>
            <div class="ad-skeleton__link"></div>
        </div>

        <!-- Product carousel -->
        <div class="ad-skeleton__carousel">
            <div class="ad-skeleton__arrow"></div>
            <div class="ad-skeleton__items">
                <div class="ad-skeleton__item"></div>
                <div class="ad-skeleton__item"></div>
                <div class="ad-skeleton__item"></div>
                <div class="ad-skeleton__item"></div>
                <div class="ad-skeleton__item"></div>
            </div>
            <div class="ad-skeleton__arrow"></div>
        </div>
    </div>
</div>

