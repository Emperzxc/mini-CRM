# Career Driver HQ - Comprehensive ATS Platform

A production-ready Applicant Tracking System (ATS) built with React, Node.js, TypeScript, and PostgreSQL, featuring RingCentral integration, real-time analytics, and multi-client management capabilities.

## 🚀 Quick Start

### Prerequisites

- Node.js 20+
- PostgreSQL 16+ (or Neon Database)
- npm or yarn

### Local Development Setup

1. **Clone the repository**

```bash
git clone https://github.com/your-org/career-driver-hq.git
cd career-driver-hq
```

2. **Install dependencies**

```bash
npm ci --legacy-peer-deps
```

3. **Configure environment**

```bash
cp .env.example .env
# Edit .env with your configuration
```

4. **Setup database**

```bash
npm run db:push
```

5. **Start development server**

```bash
npm run dev
# Application runs on http://localhost:5000
```

## 📋 Available Scripts

| Command            | Description                         |
| ------------------ | ----------------------------------- |
| `npm run dev`      | Start development server            |
| `npm run build`    | Build for production                |
| `npm start`        | Run production build                |
| `npm run check`    | TypeScript type checking            |
| `npm run db:push`  | Push database schema                |
| `npm run db:reset` | Reset database (WARNING: data loss) |
| `make test`        | Run unit tests                      |
| `make test-cov`    | Run tests with coverage             |
| `make test-e2e`    | Run E2E tests                       |
| `make lint`        | Run ESLint                          |
| `make format`      | Format code with Prettier           |
| `make validate`    | Run all checks                      |
| `make ci`          | Run complete CI pipeline            |

## 🏗️ Architecture

```
career-driver-hq/
├── client/               # React frontend
│   ├── src/
│   │   ├── components/   # Reusable UI components
│   │   ├── pages/        # Route pages
│   │   ├── hooks/        # Custom React hooks
│   │   └── lib/          # Utilities and helpers
├── server/               # Express backend
│   ├── routes.ts         # API endpoints
│   ├── storage.ts        # Data access layer
│   ├── db.ts            # Database connection
│   └── middleware/       # Express middleware
├── shared/               # Shared types and schemas
│   └── schema.ts        # Drizzle ORM schemas
├── test/                # Test suites
│   ├── unit/            # Unit tests
│   └── integration/     # Integration tests
└── e2e/                 # End-to-end tests
```

## 🔧 Technology Stack

### Frontend

- **React 18** - UI framework
- **TypeScript** - Type safety
- **Tailwind CSS** - Styling
- **Shadcn/ui** - Component library
- **TanStack Query** - Data fetching & caching
- **React Hook Form** - Form management
- **Wouter** - Routing

### Backend

- **Node.js** - Runtime
- **Express** - Web framework
- **PostgreSQL** - Database
- **Drizzle ORM** - Database ORM
- **Passport.js** - Authentication
- **Express Session** - Session management

### DevOps & Tools

- **Vite** - Build tool
- **ESLint** - Code linting
- **Prettier** - Code formatting
- **Vitest** - Unit testing
- **Playwright** - E2E testing
- **Docker** - Containerization
- **GitHub Actions** - CI/CD

## 🔐 Environment Variables

Critical environment variables required:

- `DATABASE_URL` - PostgreSQL connection string
- `NODE_ENV` - Environment (development/production)
- `PORT` - Server port (default: 5000)
- `RC_CLIENT_ID` - RingCentral client ID
- `RC_CLIENT_SECRET` - RingCentral client secret
- `STRIPE_SECRET_KEY` - Stripe API key
- `OPENAI_API_KEY` - OpenAI API key

See `.env.example` for complete list.

## 🐳 Docker Deployment

### Build and run with Docker Compose

```bash
docker-compose up --build
```

### Build production image

```bash
docker build -t career-driver-hq .
```

### Run production container

```bash
docker run -p 5000:5000 --env-file .env career-driver-hq
```

## 🧪 Testing

### Unit Tests

```bash
make test
```

### Test Coverage

```bash
make test-cov
```

### E2E Tests

```bash
make test-e2e
```

### Run all validations

```bash
make validate
```

## 📊 API Endpoints

### Health Checks

- `GET /health` - Basic health check
- `GET /healthz` - Comprehensive health with database check
- `GET /ready` - Readiness probe for K8s

### Authentication

- `GET /api/auth/user` - Get current user
- `POST /api/auth/login` - User login
- `POST /api/auth/logout` - User logout

### Main Resources

- `/api/clients` - Client management
- `/api/candidates` - Candidate tracking
- `/api/interviews` - Interview scheduling
- `/api/areas` - Area management
- `/api/dashboard` - Dashboard metrics

## 🚨 Monitoring & Alerts

The application includes comprehensive monitoring:

- **Health Endpoints** - `/health`, `/healthz`, `/ready`
- **Performance Tracking** - Request duration, memory usage
- **Error Logging** - Structured logging with levels
- **Security Monitoring** - Rate limiting, CORS, CSP headers

## 🔒 Security Features

- **Authentication** - Multi-provider auth (Replit, email/password)
- **Session Management** - Secure HTTP-only cookies
- **Input Validation** - Zod schema validation
- **SQL Injection Prevention** - Parameterized queries
- **XSS Protection** - CSP headers, input sanitization
- **Rate Limiting** - Request throttling
- **HTTPS** - Enforced in production

## 📈 Performance Optimizations

- **Database Connection Pooling** - Efficient connection management
- **Query Optimization** - Indexed queries, pagination
- **Caching** - TanStack Query caching, Redis support
- **Lazy Loading** - Code splitting, dynamic imports
- **Compression** - Gzip compression for responses
- **Memory Management** - Automatic garbage collection monitoring

## 🛠️ Troubleshooting

### Common Issues

1. **Database connection errors**
   - Verify `DATABASE_URL` is correct
   - Ensure PostgreSQL is running
   - Check network connectivity

2. **Build failures**
   - Clear cache: `rm -rf node_modules dist`
   - Reinstall: `npm ci --legacy-peer-deps`
   - Check Node.js version: `node --version`

3. **Test failures**
   - Update snapshots: `npm test -- -u`
   - Check test database: `npm run db:reset`

4. **Performance issues**
   - Monitor with `/healthz` endpoint
   - Check memory: `make monitor`
   - Review slow queries in logs

## 🔗 Zapier Webhooks Setup

### Environment Variables

Configure these environment variables for webhook support:

```bash
# HMAC signature verification (recommended)
ZAPIER_SHARED_SECRET=your-secret-key-here

# Alternative token-based auth (fallback if HMAC not used)
WEBHOOK_TOKEN=zap_hook_2025_secure_token_abc123xyz789

# Idempotency settings
IDEMP_TTL_SECONDS=86400  # Default: 24 hours
```

### Webhook Endpoints

| Endpoint | Method | Description |
|----------|--------|-------------|
| `/api/webhook/zapier` | POST | Main webhook endpoint for candidate creation |
| `/healthz` | GET | Liveness check returning `{status: "ok"}` |
| `/.well-known/ready` | GET | Readiness check returning `{ready: true}` |

### Zapier Configuration

#### Step 1: Code by Zapier Action (for HMAC signing)

Add a "Code by Zapier" action with "Run JavaScript" before your webhook step:

```javascript
const crypto = require("crypto");
const secret = inputData.secret;            // SAME as ZAPIER_SHARED_SECRET
const payload = inputData.payload || {};    // Map your Zap data
const body = JSON.stringify(payload);
const signature = crypto.createHmac("sha256", secret).update(body).digest("hex");
return { signedPayload: body, signature };
```

#### Step 2: Webhooks by Zapier Action

Configure "Webhooks by Zapier" with "Custom Request":

- **URL**: `https://ca00a2ad-36f9-49c6-9354-43e5ed2fd47e-00-3owfmw1gzf8sk.spock.replit.dev/api/webhook/zapier`
- **Method**: POST
- **Headers**:
  - `Content-Type`: `application/json`
  - `X-Zapier-Signature`: `{{steps.code.signature}}`
  - `Idempotency-Key`: `{{zap_meta_ts}}-{{unique_id}}`
- **Data (raw)**: `{{steps.code.signedPayload}}`

### Alternative: Token Authentication (for environments that strip headers)

If headers are stripped by your infrastructure, include the token in the request body:

```json
{
  "token": "zap_hook_2025_secure_token_abc123xyz789",
  "event": "candidate.created",
  "firstName": "{{firstName from source}}",
  "lastName": "{{lastName from source}}",
  "email": "{{email from source}}",
  "phone": "{{phone from source}}",
  "formName": "{{formName from source}}",
  "adName": "{{adName from source}}",
  "campaignName": "{{campaignName from source}}"
}
```

### Local Testing

Test your webhook locally using the provided signing script:

```bash
# Set your secret
SECRET="your-zapier-shared-secret"

# Create test payload
BODY='{"event":"candidate.created","firstName":"John","lastName":"Doe","email":"test@example.com"}'

# Generate signature
SIG=$(node scripts/sign-payload.js "$SECRET" "$BODY")

# Send test request
curl -i -X POST http://localhost:5000/api/webhook/zapier \
  -H "Content-Type: application/json" \
  -H "X-Zapier-Signature: $SIG" \
  -H "Idempotency-Key: test-$(date +%s)" \
  --data "$BODY"
```

Expected response:
```json
{
  "ok": true,
  "success": true,
  "candidateId": "abc123",
  "requestId": "test-1234567890",
  "receivedAt": "2025-01-02T12:00:00.000Z",
  "ackLatencyMs": 45
}
```

### Features

- **Fast ACK**: Responds in <500ms with immediate acknowledgment
- **HMAC Verification**: Validates webhook authenticity using SHA256 signatures
- **Idempotency**: Prevents duplicate processing using request IDs (24-hour TTL)
- **Structured Logging**: All webhook events are logged for debugging
- **Auto-routing**: Candidates automatically routed based on campaign rules
- **Fallback Auth**: Supports token in body when headers are stripped

### Troubleshooting

1. **401 Unauthorized**: Check ZAPIER_SHARED_SECRET matches or use token in body
2. **400 Bad Request**: Verify routing rules are configured in database
3. **Duplicate requests**: Normal - idempotency returns cached response with `duplicate: true`
4. **Header stripping**: Use internal Replit URL or pass token in request body

## 📝 Contributing

1. Fork the repository
2. Create feature branch (`git checkout -b feature/amazing-feature`)
3. Commit changes (`git commit -m 'Add amazing feature'`)
4. Push to branch (`git push origin feature/amazing-feature`)
5. Open Pull Request

## 📄 License

This project is licensed under the MIT License - see LICENSE file for details.

## 🤝 Support

For support, email support@careerdriverhq.com or create an issue in the repository.

## 🔄 Deployment Status

![CI/CD](https://github.com/your-org/career-driver-hq/actions/workflows/ci.yml/badge.svg)
![Coverage](https://codecov.io/gh/your-org/career-driver-hq/branch/main/graph/badge.svg)
![Uptime](https://img.shields.io/uptimerobot/status/m1234567890)

---

Built with ❤️ for efficient recruitment management
