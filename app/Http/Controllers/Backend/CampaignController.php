<?php


namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Campaign;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::all();
        return view('backend.campaigns.index', compact('campaigns'));
    }

    public function create()
    {
        return view('backend.campaigns.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'target' => 'required|integer',
            'price' => 'required|string',
            // 'close_campaign_after' => 'required|date',
        ]);

        Campaign::create($request->all());

        return redirect()->route('campaigns.index')->with('success', 'Campaign created successfully.');
    
    }

    public function show(Campaign $campaign)
    {
        // $campaign = Campaign::find($id);

        return view('backend.campaigns.show', compact('campaign'));
    }
    public function showSelectWinnerForm($campaignId)
    {
        // Return the Blade view for selecting a winner
        return view('backend.winner.select-winner', ['campaignId' => $campaignId]);
    }
    public function edit(Campaign $campaign)
    {
        return view('backend.campaigns.edit', compact('campaign'));
    }

    public function update(Request $request, Campaign $campaign)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'target' => 'required|integer',
            'price' => 'required|string',
            // 'close_campaign_after' => 'required|date',
        ]);

        $campaign->update($request->all());

        return redirect()->route('campaigns.index')->with('success', 'Campaign updated successfully.');
    }

    public function destroy(Campaign $campaign)
    {
        $campaign->delete();
        return redirect()->route('campaigns.index')->with('success', 'Campaign deleted successfully.');
    }
}