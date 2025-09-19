# Anipaca Vercel Deployment Script
# Run this script after logging into Vercel CLI

Write-Host "🚀 Starting Anipaca deployment to Vercel..." -ForegroundColor Green

# Check if logged into Vercel
$loggedIn = vercel whoami 2>&1
if ($LASTEXITCODE -ne 0) {
    Write-Host "❌ Please login to Vercel first:" -ForegroundColor Red
    Write-Host "   vercel login" -ForegroundColor Yellow
    exit 1
}

Write-Host "✅ Logged into Vercel as: $loggedIn" -ForegroundColor Green

# Deploy to production
Write-Host "📦 Deploying to production..." -ForegroundColor Blue
Write-Host "⚡ Setting up project with Vercel..." -ForegroundColor Yellow

# Create input for vercel prompts
$input = @(
    "y"  # Set up and deploy project
    "n"  # Link to existing project (create new)
    "anipaca"  # Project name
    ""   # Keep current directory
    ""   # No framework detected - continue
)

$inputString = ($input -join "`n") + "`n"
$inputString | vercel --prod

if ($LASTEXITCODE -eq 0) {
    Write-Host "🎉 Deployment successful!" -ForegroundColor Green
    Write-Host ""
    Write-Host "📋 Next steps:" -ForegroundColor Cyan
    Write-Host "1. Set up environment variables in Vercel dashboard"
    Write-Host "2. Configure your database (PlanetScale/Railway recommended)"
    Write-Host "3. Deploy the required APIs (zen-api and proxy)"
    Write-Host "4. Update DNS if using custom domain"
    Write-Host ""
    Write-Host "📖 See DEPLOYMENT.md for detailed instructions"
} else {
    Write-Host "❌ Deployment failed. Please check the errors above." -ForegroundColor Red
}