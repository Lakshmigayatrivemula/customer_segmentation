import pandas as pd
from sklearn.preprocessing import StandardScaler
from sklearn.cluster import KMeans
import joblib
import os

# Read customer data
df = pd.read_csv("customers.csv")

features = [
    "Age",
    "AnnualIncome",
    "SpendingScore",
    "PurchaseFrequency",
    "TotalSpend"
]

X = df[features]

# Scale data
scaler = StandardScaler()
X_scaled = scaler.fit_transform(X)

# Train K-Means
kmeans = KMeans(
    n_clusters=4,
    random_state=42,
    n_init=10
)

df["Cluster"] = kmeans.fit_predict(X_scaled)

# Create folders
os.makedirs("models", exist_ok=True)
os.makedirs("data", exist_ok=True)

# Save models
joblib.dump(scaler, "models/scaler.pkl")
joblib.dump(kmeans, "models/kmeans_model.pkl")

# Save segmented data
df.to_csv("data/segmented_customers.csv", index=False)

print("Models created successfully!")