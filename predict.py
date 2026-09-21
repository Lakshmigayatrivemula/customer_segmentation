import os
import sys
import joblib
import pandas as pd

# Get project folder
BASE_DIR = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))

# Get input values
age = float(sys.argv[1])
income = float(sys.argv[2])
spending = float(sys.argv[3])
frequency = float(sys.argv[4])
total_spend = float(sys.argv[5])

# Load trained models
scaler = joblib.load(
    os.path.join(BASE_DIR, "models", "scaler.pkl")
)

model = joblib.load(
    os.path.join(BASE_DIR, "models", "kmeans_model.pkl")
)

# Create customer data
customer = pd.DataFrame({
    "Age": [age],
    "AnnualIncome": [income],
    "SpendingScore": [spending],
    "PurchaseFrequency": [frequency],
    "TotalSpend": [total_spend]
})

# Scale customer data
customer_scaled = scaler.transform(customer)

# Predict cluster
prediction = model.predict(customer_scaled)

# Display cluster number
print(prediction[0])