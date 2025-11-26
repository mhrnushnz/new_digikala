<div class="ad-skeleton">
    <style>
        .ad-skeleton {
            --skeleton-light: #edf1f7;
            --skeleton-dark: #d9e1ec;

            width: 100%;
            padding: 20px 0;
            display: flex;
            justify-content: center;
            background: #f8fafc;
        }

        .ad-skeleton__container {
            display: flex;
            gap: 24px;
            width: 100%;
            max-width: 1200px;
            flex-wrap: wrap;
        }

        .ad-skeleton__card {
            position: relative;
            flex: 1 1 48%;
            height: 220px;
            border-radius: 16px;
            overflow: hidden;
            background: linear-gradient(90deg, var(--skeleton-light) 25%, var(--skeleton-dark) 50%, var(--skeleton-light) 75%);
            background-size: 200% 100%;
            animation: ad-skeleton-shimmer 1.6s linear infinite;
            box-shadow: 0 6px 20px rgba(14, 30, 41, 0.06);
        }

        .ad-skeleton__image {
            width: 100%;
            height: 100%;
            opacity: 0.35;
            background: rgba(255, 255, 255, 0.5);
        }

        .ad-skeleton__overlay {
            position: absolute;
            inset: 0;
            padding: 24px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            gap: 10px;
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
            height: 22px;
        }

        .ad-skeleton__title.short {
            width: 45%;
        }

        .ad-skeleton__subtitle {
            width: 40%;
            height: 14px;
            border-radius: 6px;
        }

        .ad-skeleton__subtitle.short {
            width: 30%;
        }

        .ad-skeleton__button {
            width: 80px;
            height: 30px;
            border-radius: 999px;
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
            .ad-skeleton__container {
                flex-direction: column;
            }
            .ad-skeleton__card {
                flex-basis: 100%;
                height: 160px;
            }
        }


    </style>

    <div class="ad-skeleton__container">
        <!-- Card 1 -->
        <div class="ad-skeleton__card">
            <div class="ad-skeleton__image"></div>
            <div class="ad-skeleton__overlay">
                <div class="ad-skeleton__title short"></div>
                <div class="ad-skeleton__subtitle"></div>
                <div class="ad-skeleton__button"></div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="ad-skeleton__card dark">
            <div class="ad-skeleton__image"></div>
            <div class="ad-skeleton__overlay">
                <div class="ad-skeleton__title"></div>
                <div class="ad-skeleton__subtitle short"></div>
                <div class="ad-skeleton__button"></div>
            </div>
        </div>
    </div>
</div>



