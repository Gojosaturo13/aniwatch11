# Anipaca Vercel Deployment Guide

This guide will help you deploy the Anipaca anime streaming website to Vercel.

## Prerequisites

1. [Vercel CLI](https://vercel.com/download) installed
2. A Vercel account
3. MySQL database (use PlanetScale, Railway, or similar for production)
4. API endpoints deployed (zen-api and proxy)

## Setup Instructions

### 1. Database Setup

Since Vercel is serverless, you'll need an external MySQL database:

**Option A: PlanetScale (Recommended)**
- Sign up at [PlanetScale](https://planetscale.com)
- Create a new database
- Import the `database.sql` file
- Get connection details

**Option B: Railway**
- Sign up at [Railway](https://railway.app)
- Deploy MySQL service
- Import the `database.sql` file
- Get connection details

### 2. API Dependencies

Deploy these required APIs first:

1. **Zen API**: https://github.com/PacaHat/zen-api
   - Deploy to Vercel using the deploy button
   - Note the deployment URL

2. **Proxy Service** (Optional): https://github.com/PacaHat/shrina-proxy
   - Deploy to Vercel for faster loading
   - Note the deployment URL

### 3. Deploy to Vercel

#### Method 1: Vercel CLI (Recommended)

```bash
# Navigate to project directory
cd /path/to/Anipaca

# Login to Vercel
vercel login

# Deploy
vercel --prod
```

#### Method 2: GitHub + Vercel Dashboard

1. Push code to GitHub repository
2. Connect repository to Vercel
3. Configure environment variables
4. Deploy

### 4. Environment Variables

Set these in your Vercel dashboard or using CLI:

```bash
# Database configuration
vercel env add DB_HOST
vercel env add DB_USER
vercel env add DB_PASS
vercel env add DB_NAME

# API configuration
vercel env add ZEN_API_URL
vercel env add PROXY_URL
vercel env add USE_EXTERNAL_PROXY
```

**Environment Variable Values:**

| Variable | Description | Example |
|----------|-------------|---------|
| `DB_HOST` | Database hostname | `your-db.planetscale.sh` |
| `DB_USER` | Database username | `your-username` |
| `DB_PASS` | Database password | `your-password` |
| `DB_NAME` | Database name | `anipaca` |
| `ZEN_API_URL` | Zen API endpoint | `https://zen-api-brown.vercel.app` |
| `PROXY_URL` | Proxy service URL | `https://m3u8proxy.vercel.app/proxy?url=` |
| `USE_EXTERNAL_PROXY` | Use external proxy | `true` or `false` |

### 5. Custom Domain (Optional)

1. Go to your Vercel project dashboard
2. Navigate to Settings > Domains
3. Add your custom domain
4. Configure DNS records as instructed

## Troubleshooting

### Common Issues

1. **Database Connection Failed**
   - Verify environment variables are set correctly
   - Check database credentials
   - Ensure database accepts connections from Vercel IPs

2. **API Errors**
   - Verify ZEN_API_URL is accessible
   - Check if API endpoints are working
   - Review API rate limits

3. **Static Files Not Loading**
   - Check file paths in CSS/JS references
   - Verify Vercel routing configuration
   - Check file permissions

### Performance Optimization

1. **Enable External Proxy**: Set `USE_EXTERNAL_PROXY=true`
2. **Database Connection Pool**: Consider using connection pooling
3. **CDN**: Use Vercel's edge network for static files
4. **Caching**: Leverage browser caching for assets

## Security Notes

- Never commit database credentials to version control
- Use environment variables for all sensitive data
- Enable security headers (already configured in vercel.json)
- Consider implementing rate limiting for API calls

## Support

If you encounter issues:
1. Check Vercel function logs
2. Verify all environment variables
3. Test database connectivity
4. Review API endpoint status

For more help, refer to:
- [Vercel PHP Documentation](https://vercel.com/docs/functions/serverless-functions/runtimes/php)
- [Original Project Repository](https://github.com/PacaHat/Anipaca)