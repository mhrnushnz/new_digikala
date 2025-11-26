<div class="ad-skeleton">
    <style>
        .ad-skeleton {
            --bg: #f6f8fb;
            --skeleton-light: #eaeef3;
            --skeleton-dark: #d6dde6;

            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            padding: 24px 0;
            background: var(--bg);
            overflow: hidden;
        }

        .ad-skeleton__slider {
            width: 100%;
            max-width: 1200px;
            height: 260px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }

        /* Arrows (left & right) */
        .ad-skeleton__arrow {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(90deg, var(--skeleton-light) 25%, var(--skeleton-dark) 50%, var(--skeleton-light) 75%);
            background-size: 200% 100%;
            animation: ad-skeleton-shimmer 1.6s linear infinite;
        }

        /* Main slide card */
        .ad-skeleton__slide {
            flex: 1;
            height: 100%;
            border-radius: 16px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 6px 16px rgba(20, 40, 70, 0.05);
            display: flex;
            align-items: center;
            gap: 40px;
            padding: 24px 40px;
        }

        /* Product image placeholder */
        .ad-skeleton__image {
            flex: 0 0 380px;
            height: 200px;
            border-radius: 12px;
            background: linear-gradient(90deg, var(--skeleton-light) 25%, var(--skeleton-dark) 50%, var(--skeleton-light) 75%);
            background-size: 200% 100%;
            animation: ad-skeleton-shimmer 1.6s linear infinite;
        }

        /* Text area (title, subtitle, button) */
        .ad-skeleton__content {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 12px;
        }

        .ad-skeleton__title,
        .ad-skeleton__subtitle,
        .ad-skeleton__button {
            border-radius: 999px;
            background: linear-gradient(90deg, var(--skeleton-light) 25%, var(--skeleton-dark) 50%, var(--skeleton-light) 75%);
            background-size: 200% 100%;
            animation: ad-skeleton-shimmer 1.6s linear infinite;
        }

        .ad-skeleton__title {
            width: 60%;
            height: 24px;
        }

        .ad-skeleton__title.long {
            width: 75%;
        }

        .ad-skeleton__subtitle {
            width: 40%;
            height: 16px;
            border-radius: 6px;
        }

        .ad-skeleton__button {
            width: 80px;
            height: 32px;
            margin-top: 6px;
        }

        /* Animation */
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
            .ad-skeleton__slider {
                flex-direction: column;
                height: auto;
            }

            .ad-skeleton__arrow {
                display: none;
            }

            .ad-skeleton__slide {
                flex-direction: column;
                padding: 16px;
                gap: 20px;
                height: auto;
            }

            .ad-skeleton__image {
                width: 100%;
                height: 160px;
            }

            .ad-skeleton__title {
                width: 80%;
            }
        }

    </style>

    <div class="ad-skeleton__slider">
        <!-- Arrow left -->
        <div class="ad-skeleton__arrow"></div>

        <!-- Slide content -->
        <div class="ad-skeleton__slide">
            <div class="ad-skeleton__image"></div>
            <div class="ad-skeleton__content">
                <div class="ad-skeleton__title long"></div>
                <div class="ad-skeleton__subtitle"></div>
                <div class="ad-skeleton__button"></div>
            </div>
        </div>

        <!-- Arrow right -->
        <div class="ad-skeleton__arrow"></div>
    </div>
</div>

