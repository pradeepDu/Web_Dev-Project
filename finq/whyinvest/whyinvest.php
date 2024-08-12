<?php
include "../include/navbar.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Multiple Sliding Cards</title>
<style>

    .maincontainer {
        display: block; 
        background-color: white;
    }

    .card-container {
        width: 100%; 
        height: 350px;
        margin-bottom: 20px; 
    }

    .card {
        position: relative;
        width: 100%;
        height: 100%;
        transform-style: preserve-3d;
        transition: all 0.5s ease;
    }

    .card:hover {
        transform: rotateX(180deg);
    }

    .front,
    .back {
        position: absolute;
        width: 100%;
        height: 100%;
        backface-visibility: hidden;
        color: #333;
        text-align: center;
        font-family: 'zilla slab', sans-serif;
        border-radius: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .front {
        background: white;
    }

    .back {
        background: rgba(255, 255, 255, 0.475);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        transform: rotateX(180deg);
    }

        .card-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 20px;
}

.head
{
    margin: 5vh;
    display: flex;
    justify-content: center;
    font-weight: bolder;
    font-size: 3rem;
    color:#265073;
}

#head2{
    font-size: 1.5rem;
}

</style>
</head>
<body>
    &nbsp;
    <div class="maincontainer">
        <h1 class="head">DEMYSTIFYING FINANCE</h1>
        
        <div class="card-container">
            <div class="card">
                <div class="front">
                    <img class="card-img" src="../assets/img1n.jpg" alt="Front Image 1">
                </div>
                <div class="back">
                    <h3 style="color: #02C39A; font-size: x-large;">THE SKILL OF FINANCE MANAGEMENT</h3>
                    Effective financial management is essential for achieving stability and reaching financial objectives. By actively managing finances, individuals gain control over spending, saving, and investing practices, enabling informed decision-making aligned with their goals. Whether establishing emergency funds, saving for significant purchases, or planning retirement, prudent financial management fosters security and independence. Tracking expenses, creating budgets, and optimizing investments mitigate risks and capitalize on growth opportunities. In essence, disciplined financial management empowers individuals to navigate uncertainties confidently, ensuring long-term financial well-being.
                    </div>
            </div>
        </div>
        <div class="card-container">
            <div class="card">
                <div class="front">
                    <img class="card-img" src="../assets/investment_2.jpg" alt="Front Image 2">
                </div>
                <div class="back">
                    <h3 style="color: #00A896; font-size: x-large;">WHY YOU SHOULD INVEST? </h3>
                    Investing is essential for securing financial stability and achieving long-term goals. By allocating funds into diverse assets like stocks, bonds, or real estate, investors can generate returns that outpace inflation and build wealth over time. Investing also provides avenues for passive income and capital appreciation, allowing individuals to grow their assets while minimizing risks through diversification. Whether saving for retirement, funding education, or simply increasing wealth, investing offers a strategic approach to financial growth and security in an ever-changing economic landscape.Investing is key to financial growth and security. By wisely allocating your funds into diverse assets, you can build wealth, beat inflation, and secure your future. Through investments, you generate passive income, capitalize on compounding returns, and work towards achieving your long-term financial goals. Start investing today to pave the way for a prosperous tomorrow.</p>
                    </div>
            </div>
        </div>
        <div class="card-container">
            <div class="card">
                <div class="front">
                    <img class="card-img" src="../assets/wiimg3.jpg" alt="Front Image 3">
                </div>
                <div class="back">
                    <h3 style="color: #028090; font-size: x-large;">DEMYSTIFYING STOCK MARKET</h3>
                    The term stock market refers to several exchanges in which shares of publicly held companies are bought and sold. Such financial activities are conducted through formal exchanges and via over-the-counter (OTC) marketplaces that operate under a defined set of regulations. The stock market is experiencing volatility driven by economic data, geopolitical tensions, and policy changes. Tech stocks are fluctuating, while energy and commodity sectors are influenced by geopolitical events. Investors are cautious amid uncertainty about economic recovery and inflation. Stay informed, diversify, and monitor upcoming events like Fed meetings and earnings reports
                    <h4>Advice: Stay informed, diversify, consider risk tolerance.</h4>
                    &nbsp;
                    <a href="https://corporatefinanceinstitute.com/resources/career-map/sell-side/capital-markets/stock-market/">More on stock-market</a></div>
            </div>
        </div>
        <div class="card-container">
            <div class="card">
                <div class="front">
                    <img class="card-img" src="../assets/b4.jpg" alt="Front Image 4">
                </div>
                <div class="back">
                    <h3 style="color: #05668D; font-size: x-large;">BUILDING WEALTH THORUGH SAVINGS: A CONCISE OVERVIEW</h3>
                    Saving money is a cornerstone of financial success, providing the foundation for building wealth and achieving long-term goals. By consistently setting aside a portion of your income, you create a safety net for unexpected expenses and opportunities for future investments. Whether it's through automated transfers to a savings account or cutting back on non-essential expenses, every dollar saved contributes to your financial security. Over time, the habit of saving not only accumulates funds but also instills discipline and financial resilience, laying the groundwork for a brighter financial future.Saving is essential for financial security. It's about setting aside a portion of your income for future needs or emergencies. Whether it's for a rainy day fund, a major purchase, or retirement, consistent saving builds a financial safety net and opens up opportunities for long-term goals. Remember, every penny saved today paves the way for a more secure tomorrow.</div>
            </div>
        </div>
    </div>
</body>
<?php include "../include/footer.php" ?>
</html>