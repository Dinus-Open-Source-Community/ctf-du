from flask import Flask, request, render_template_string, session
import random, os

app = Flask(__name__)
app.secret_key = os.urandom(24)

QUOTES = [
    "The only secure system is one that's powered off.",
    "Security is always excessive until it's not enough.",
    "There are two types of companies: those that have been hacked, and those that don't know they've been hacked."
]

@app.route('/', methods=['GET', 'POST'])
def index():
    if 'visits' not in session:
        session['visits'] = 0
    session['visits'] += 1

    name = request.args.get('name', 'Cyber Explorer')
    quote = random.choice(QUOTES)
    
    template = f"""
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CyberGreeter</title>
        <style>
            body {{
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background: linear-gradient(135deg, #1a2a6c, #b21f1f, #fdbb2d);
                color: white;
                margin: 0;
                padding: 0;
                min-height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
            }}
            .container {{
                background-color: rgba(0, 0, 0, 0.7);
                border-radius: 15px;
                padding: 30px;
                width: 80%;
                max-width: 800px;
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
                text-align: center;
                backdrop-filter: blur(5px);
            }}
            h1 {{
                font-size: 2.5rem;
                margin-bottom: 20px;
                color: #4fc3f7;
                text-shadow: 0 0 10px rgba(79, 195, 247, 0.5);
            }}
            .greeting {{
                font-size: 1.8rem;
                margin: 20px 0;
                padding: 15px;
                background-color: rgba(255, 255, 255, 0.1);
                border-radius: 8px;
                border-left: 4px solid #4fc3f7;
            }}
            .quote {{
                font-style: italic;
                margin: 25px 0;
                color: #a5d6a7;
            }}
            .visits {{
                margin-top: 20px;
                font-size: 0.9rem;
                color: #b0bec5;
            }}
            .hint {{
                margin-top: 30px;
                padding: 10px;
                background-color: rgba(255, 152, 0, 0.2);
                border-radius: 5px;
                font-size: 0.9rem;
                color: #ffcc80;
            }}
            .input-area {{
                margin: 25px 0;
            }}
            input[type="text"] {{
                padding: 10px;
                width: 60%;
                border: none;
                border-radius: 4px;
                background-color: rgba(255, 255, 255, 0.9);
            }}
            button {{
                padding: 10px 20px;
                background-color: #4fc3f7;
                color: black;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-weight: bold;
                transition: all 0.3s;
            }}
            button:hover {{
                background-color: #29b6f6;
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(41, 182, 246, 0.4);
            }}
        </style>
    </head>
    <body>
        <div class="container">
            <h1>⚡ CyberGreeter Pro ⚡</h1>
            
            <div class="greeting">
                Hello, {name}! Welcome to our secure system.
            </div>
            
            <div class="quote">
                "{quote}"
            </div>
            
            <div class="input-area">
                <form method="GET" action="/">
                    <input type="text" name="name" placeholder="Enter your hacker name..." required>
                    <button type="submit">Greet Me</button>
                </form>
            </div>
            
            <div class="hint">
                <strong>Pro Tip:</strong> Our system personalizes greetings using advanced AI templating technology.
            </div>
            
            <div class="visits">
                Page visits: {session['visits']}
            </div>
        </div>
    </body>
    </html>
    """
    return render_template_string(template)

if __name__ == '__main__':
    app.run(debug=False, port=8000)
