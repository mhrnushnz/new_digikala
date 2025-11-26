<div class="ad-skeleton">
    <style>
        .ad-skeleton {
            --light: #f4f4f4;
            --mid: #e3e3e3;
            --dark: #d6d6d6;
            --green: #2b8a3e;
            --red: #e63946;

            width: 100%;
            display: flex;
            justify-content: center;
            padding: 30px 0;
            background: #fff;
        }

        .ad-skeleton__container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            width: 95%;
            max-width: 1500px;
            background: #f1f1f1;
            border-radius: 20px;
            padding: 20px 30px;
        }

        /* Right section */
        .ad-skeleton__right {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .ad-skeleton__title,
        .ad-skeleton__icon,
        .ad-skeleton__discount,
        .ad-skeleton__circle {
            background: linear-gradient(90deg, var(--light) 25%, var(--mid) 50%, var(--light) 75%);
            background-size: 200% 100%;
            animation: ad-skeleton-shimmer 1.6s linear infinite;
            border-radius: 8px;
        }

        .ad-skeleton__title {
            width: 180px;
            height: 20px;
            border-radius: 6px;
        }

        .ad-skeleton__icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
        }

        /* Discount pill */
        .ad-skeleton__discount {
            width: 120px;
            height: 34px;
            border-radius: 25px;
        }

        /* Product circles */
        .ad-skeleton__products {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .ad-skeleton__circle {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            position: relative;
        }

        .ad-skeleton__circle.large {
            width: 100px;
            height: 100px;
        }

        /* Shimmer animation */
        @keyframes ad-skeleton-shimmer {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }

        /* Responsive */
        @media (max-width: 900px) {
            .ad-skeleton__container {
                flex-direction: column-reverse;
                align-items: center;
                padding: 20px;
            }

            .ad-skeleton__products {
                flex-wrap: wrap;
                justify-content: center;
            }

            .ad-skeleton__circle {
                width: 60px;
                height: 60px;
            }

            .ad-skeleton__discount {
                width: 100px;
                height: 30px;
            }
        }

    </style>

    <div class="ad-skeleton__container">
        <!-- Right section (title + icon) -->
        <div class="ad-skeleton__right">
            <div class="ad-skeleton__title"></div>
            <div class="ad-skeleton__icon"></div>
        </div>

        <!-- Middle section (discount button) -->
        <div class="ad-skeleton__discount"></div>

        <!-- Left side (products carousel) -->
        <div class="ad-skeleton__products">
            <div class="ad-skeleton__circle large"></div>
            <div class="ad-skeleton__circle"></div>
            <div class="ad-skeleton__circle"></div>
            <div class="ad-skeleton__circle"></div>
            <div class="ad-skeleton__circle"></div>
            <div class="ad-skeleton__circle"></div>
        </div>
    </div>
</div>

